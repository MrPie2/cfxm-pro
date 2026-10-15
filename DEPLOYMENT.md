# Production auto-deployment (GitHub webhook)
ttt west
This repository includes `deploy-webhook.php` for the production checkout at `~/public_html`. It is a **GitHub webhook listener**, not a local filesystem watcher: GitHub notifies the endpoint when `main` receives a push, and PHP runs a fast-forward-only `git pull`.

## One-time production setup

1. Merge the deployment files into `main`, then run this once in the hosting account's SSH terminal to get the webhook file onto production:

   ```bash
   cd ~/public_html
   git checkout main
   git pull --ff-only origin main
   ```

2. Confirm GitHub SSH authentication works for the same hosting account:

   ```bash
   ssh -T git@github.com
   git -C ~/public_html pull --ff-only origin main
   ```

   The second command should complete without asking for a password. If it fails, fix the repository's SSH key/known-host setup before enabling the webhook.

3. Create a random secret **outside** `public_html` and display it so it can be copied into GitHub's webhook settings:

   ```bash
   umask 077
   openssl rand -hex 32 > "$HOME/.cfxm-pro-deploy-secret"
   chmod 600 "$HOME/.cfxm-pro-deploy-secret"
   cat "$HOME/.cfxm-pro-deploy-secret"
   ```

   Keep this secret private. Do not commit it or put it in a file inside `public_html`.

4. In GitHub, open **MrPie2/cfxm-pro → Settings → Webhooks → Add webhook** and set:
   - **Payload URL:** `https://www.cfxm-pro.com/deploy-webhook.php`
   - **Content type:** `application/json`
   - **Secret:** paste the value printed in step 3
   - **Which events:** **Just the push event**
   - Enable the webhook.

5. In GitHub's webhook page, open **Recent Deliveries** and inspect a delivery after a push to `main`. A successful deployment responds with HTTP `200` and `Production updated from main`.

## Security and behaviour

- Validates GitHub's `X-Hub-Signature-256` HMAC signature using the secret stored outside the web root.
- Accepts only push events from `MrPie2/cfxm-pro` targeting `refs/heads/main`.
- Runs only `git pull --ff-only origin main`; it does not accept commands or paths from the request body.
- Uses a lock to avoid overlapping deployments.
- Writes diagnostic output to `~/.cfxm-pro-deploy.log`, outside `public_html`.
- If deployment fails, check that log and GitHub's Recent Deliveries. Common causes are SSH authentication, disabled PHP `proc_open`, or local production changes that prevent a fast-forward pull.
- Keep the production checkout clean and deploy through GitHub. Do not edit tracked files directly on production.
- The webhook can only deploy after the initial one-time setup above. Merges and pushes to branches other than `main` do not deploy.

## Testing a deployment

After configuring the webhook secret and saving the GitHub webhook, push a small documentation change to `main`. In **Settings → Webhooks → Recent Deliveries**, the push delivery should return HTTP `200` with `Production updated from main`. A `202` means the handler intentionally skipped that event or branch; a `401 Invalid signature` means the signature did not match the configured secret.

## Non-interactive SSH troubleshooting

The webhook runs Git from PHP, so it may not inherit the interactive terminal's SSH-agent environment. If manual `git pull` succeeds but a webhook deployment fails with `Permission denied (publickey)`, verify the SSH key and GitHub host key for the same hosting account that runs the checkout. Do not put a private key or passphrase in this repository. After fixing authentication, push a new commit to `main` to trigger another deployment and inspect `~/.cfxm-pro-deploy.log` plus GitHub Webhooks → Recent Deliveries.

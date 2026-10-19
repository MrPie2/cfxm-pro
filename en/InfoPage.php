<?php
declare(strict_types=1);

/**
 * Public information pages for CFXM-PRO.
 * The page key is allow-listed so arbitrary paths cannot control rendered content.
 */
$pages = [
    'about' => [
        'title' => 'About CFXM-PRO',
        'eyebrow' => 'Who we are',
        'intro' => 'A clearer place to explore markets, review available tools and manage your CFXM-PRO account.',
        'sections' => [
            ['title' => 'Built around informed decisions', 'body' => 'Explore market information and account features in one place. Review the details available to you before making a financial decision.'],
            ['title' => 'Your account, your control', 'body' => 'Use your account dashboard to review available features and manage your profile. Account features may depend on your account status and the services enabled for you.'],
        ],
    ],
    'markets' => [
        'title' => 'Explore Markets',
        'eyebrow' => 'Market overview',
        'intro' => 'Explore market information and instruments available through the CFXM-PRO experience.',
        'sections' => [
            ['title' => 'Review before you trade', 'body' => 'Market prices can move quickly and losses are possible. Review instrument details, pricing and risk before making any trading decision.'],
            ['title' => 'Explore market tools', 'body' => 'Open the market area to view the market features currently available to your account. Availability and data may vary.'],
        ],
    ],
    'plans' => [
        'title' => 'Plans & Account Options',
        'eyebrow' => 'Choose your next step',
        'intro' => 'Review the account and plan options presented by CFXM-PRO before proceeding.',
        'sections' => [
            ['title' => 'Compare details carefully', 'body' => 'Check the current plan details, eligibility, fees and applicable terms before you sign up or make a payment. Do not rely on a headline or estimate alone.'],
            ['title' => 'Already have an account?', 'body' => 'Sign in to review the options available to your account. New users can continue to registration.'],
        ],
    ],
    'platforms' => [
        'title' => 'Trading Tools & Platforms',
        'eyebrow' => 'Tools',
        'intro' => 'Find the market and account tools currently available through CFXM-PRO.',
        'sections' => [
            ['title' => 'Use available features', 'body' => 'Available tools depend on the features enabled for the site and your account. Review each feature before connecting accounts or relying on market data.'],
            ['title' => 'Need help?', 'body' => 'Contact support if you need clarification about a tool or how to access a feature.'],
        ],
    ],
    'support' => [
        'title' => 'Help & Support',
        'eyebrow' => 'We can help',
        'intro' => 'Find help with account access, verification and using the CFXM-PRO dashboard.',
        'sections' => [
            ['title' => 'Account access', 'body' => 'If you cannot sign in, use the account recovery options provided on the login page. Never share your password, verification codes or private keys with anyone.'],
            ['title' => 'Payments and verification', 'body' => 'Check the status shown in your account and keep any transaction references for your records. Do not send a payment twice just because a status has not updated.'],
        ],
    ],
    'education' => [
        'title' => 'Trading Education',
        'eyebrow' => 'Learn the basics',
        'intro' => 'Build your understanding of markets, trading terminology and risk management before making financial decisions.',
        'sections' => [
            ['title' => 'Understand the risks', 'body' => 'Trading involves risk and you may lose some or all of the money you commit. Learn about volatility, leverage, fees and position sizing before trading.'],
            ['title' => 'Keep learning', 'body' => 'Use the market and account tools available on this site to explore features. Educational information is not personalised financial advice.'],
        ],
    ],
    'insights' => [
        'title' => 'Market Insights',
        'eyebrow' => 'Market context',
        'intro' => 'Use market context as one input to your own research, not as a guarantee of future performance.',
        'sections' => [
            ['title' => 'Markets can change quickly', 'body' => 'Economic announcements, liquidity and market sentiment can affect prices. Verify information independently and consider the downside as well as the potential upside.'],
            ['title' => 'Make informed decisions', 'body' => 'Past performance does not guarantee future results. This information is general in nature and is not a recommendation to buy or sell an instrument.'],
        ],
    ],
    'terms' => [
        'title' => 'Terms & Risk Information',
        'eyebrow' => 'Important information',
        'intro' => 'Review the terms and risk information that apply to your use of CFXM-PRO.',
        'sections' => [
            ['title' => 'Understand the risks', 'body' => 'Financial markets involve risk. Only make decisions after reviewing the relevant product information, fees and risks, and never commit money you cannot afford to lose.'],
            ['title' => 'Account terms', 'body' => 'The terms displayed in your account and the applicable site policies govern your use of the service. If anything is unclear, contact support before proceeding.'],
        ],
    ],
];
$key = isset($_GET['page']) && is_string($_GET['page']) ? $_GET['page'] : 'about';
if (!isset($pages[$key])) {
    http_response_code(404);
    $key = 'about';
}
$page = $pages[$key];
function h(string $value): string { return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= h($page['title']) ?> | CFXM-PRO</title>
<meta name="description" content="<?= h($page['intro']) ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/en/site-theme.css?v=1" rel="stylesheet">
<style>
:root{--cfx-blue:#1769e0;--cfx-ink:#14213a;--cfx-muted:#64748b;--cfx-line:#e5eaf2}
*{box-sizing:border-box}body{margin:0;background:#f5f8fc;color:var(--cfx-ink);font-family:Inter,system-ui,sans-serif}
.cfx-nav{background:#fff;border-bottom:1px solid var(--cfx-line)}.cfx-nav-inner{max-width:1160px;margin:auto;padding:16px 22px;display:flex;align-items:center;justify-content:space-between;gap:16px}
.cfx-brand{font-weight:800;letter-spacing:-.04em;font-size:1.25rem;color:var(--cfx-ink);text-decoration:none}.cfx-brand span{color:var(--cfx-blue)}
.cfx-nav-actions{display:flex;gap:10px;align-items:center}.cfx-btn{display:inline-flex;align-items:center;justify-content:center;border-radius:10px;padding:11px 16px;font-weight:700;text-decoration:none;border:1px solid var(--cfx-line);color:var(--cfx-ink);background:#fff}.cfx-btn-primary{background:var(--cfx-blue);border-color:var(--cfx-blue);color:#fff}
.cfx-main{max-width:1160px;margin:0 auto;padding:62px 22px 76px}.cfx-hero{background:linear-gradient(130deg,#10294d,#155bc1);border-radius:26px;color:#fff;padding:clamp(28px,6vw,68px);position:relative;overflow:hidden}.cfx-hero:after{content:"";position:absolute;width:300px;height:300px;border:1px solid #ffffff30;border-radius:50%;right:-90px;top:-120px;box-shadow:0 0 0 38px #ffffff0c,0 0 0 78px #ffffff08}
.cfx-eyebrow{font-size:.78rem;letter-spacing:.14em;text-transform:uppercase;font-weight:800;color:#bcd7ff}.cfx-hero h1{font-size:clamp(2.1rem,5vw,3.8rem);line-height:1.08;letter-spacing:-.055em;font-weight:800;max-width:760px;margin:16px 0}.cfx-hero p{max-width:720px;color:#e2ecff;font-size:1.08rem;line-height:1.8;margin-bottom:24px}
.cfx-section-title{font-weight:800;letter-spacing:-.035em}.cfx-info-card{height:100%;background:#fff;border:1px solid var(--cfx-line);border-radius:18px;padding:26px;box-shadow:0 10px 30px #17365d08}.cfx-info-card h2{font-size:1.12rem;font-weight:800}.cfx-info-card p{color:var(--cfx-muted);line-height:1.75;margin:0}.cfx-bottom{margin-top:26px;padding:22px;border-radius:16px;background:#eaf2ff;display:flex;justify-content:space-between;align-items:center;gap:18px;flex-wrap:wrap}.cfx-footer{border-top:1px solid var(--cfx-line);background:#fff;color:var(--cfx-muted);padding:24px;text-align:center;font-size:.9rem}
@media(max-width:575px){.cfx-nav-inner{padding:13px 15px}.cfx-nav-actions .cfx-btn{padding:9px 11px;font-size:.84rem}.cfx-main{padding:28px 15px 44px}.cfx-hero{border-radius:20px}.cfx-bottom{align-items:stretch}.cfx-bottom .cfx-btn{width:100%}}
</style>
</head>
<body>
<header class="cfx-nav"><div class="cfx-nav-inner">
<a class="cfx-brand" href="/en/Index.php" aria-label="CFXM-PRO home">CFXM<span>-PRO</span></a>
<nav class="cfx-nav-actions" aria-label="Account navigation"><a class="cfx-btn" href="/Dashboard/LoginContainer.php">Log in</a><a class="cfx-btn cfx-btn-primary" href="/Dashboard/SignupContainer.php">Get started</a></nav>
</div></header>
<main class="cfx-main">
<section class="cfx-hero"><div class="cfx-eyebrow"><?= h($page['eyebrow']) ?></div><h1><?= h($page['title']) ?></h1><p><?= h($page['intro']) ?></p><a class="cfx-btn cfx-btn-primary" href="/Dashboard/SignupContainer.php">Create an account</a></section>
<section class="mt-5"><h2 class="cfx-section-title mb-4">Explore CFXM-PRO</h2><div class="row g-3"><?php foreach ($page['sections'] as $section): ?><div class="col-12 col-md-6"><article class="cfx-info-card"><h2><?= h($section['title']) ?></h2><p><?= h($section['body']) ?></p></article></div><?php endforeach; ?></div>
<div class="cfx-bottom"><div><strong>Need to access your account?</strong><div class="text-secondary mt-1">Sign in to view the features available to you.</div></div><a class="cfx-btn cfx-btn-primary" href="/Dashboard/LoginContainer.php">Open dashboard</a></div></section>
</main>
<footer class="cfx-footer"><a href="/en/Index.php" class="text-decoration-none">CFXM-PRO</a> · Please review product information and risks before making financial decisions.</footer>
</body></html>

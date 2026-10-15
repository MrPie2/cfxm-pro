<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
   /* Theme switcher compatibility tokens mapped to the same shared colors as Header.php. */
   :root {
       --bg-color: var(--cfxm-bg-deep, #0b161c);
       --bg-color2: var(--cfxm-surface, #222831);
       --text-color: var(--cfxm-text, #DFD0B8);
       --liner-text-color: var(--cfxm-text, #DFD0B8);
       --card-bg: var(--cfxm-surface, #222831);
       --accent: var(--cfxm-purple, #49247e);
       --body-bg: var(--cfxm-bg, #121f27);
       --nav-bg: var(--cfxm-surface, #222831);
       --liner-bg: var(--cfxm-surface-raised, #27313b);
       --box-color: var(--cfxm-line, rgba(223, 208, 184, .14));
   }

   html[data-theme="light"] {
       --bg-color: var(--cfxm-bg-deep, #edf0f5);
       --bg-color2: var(--cfxm-surface, #fff);
       --text-color: var(--cfxm-text, #202438);
       --liner-text-color: var(--cfxm-text, #202438);
       --card-bg: var(--cfxm-surface, #fff);
       --accent: var(--cfxm-purple, #49247e);
       --body-bg: var(--cfxm-bg, #f5f6fa);
       --nav-bg: var(--cfxm-surface, #fff);
       --liner-bg: var(--cfxm-surface-raised, #fff);
       --box-color: var(--cfxm-line, rgba(26, 35, 55, .12));
   }

   .theme-switcher { display: flex; align-items: center; }
   .theme-switcher .switch-dark {
       display: inline-flex;
       align-items: center;
       justify-content: center;
       min-width: 42px;
       min-height: 42px;
       color: var(--cfxm-text, #DFD0B8);
       cursor: pointer;
   }
   .theme-switcher .switch-dark i {
       color: var(--cfxm-text, #DFD0B8) !important;
       font-size: 20pt;
       margin-top: 0 !important;
   }
   html[data-theme="light"] .theme-switcher .switch-dark,
   html[data-theme="light"] .theme-switcher .switch-dark i {
       color: var(--cfxm-text, #202438) !important;
   }

   /* Keep headings and form labels readable in both themes, overriding legacy page styles. */
   html[data-theme="dark"] h1,
   html[data-theme="dark"] h2,
   html[data-theme="dark"] h3,
   html[data-theme="dark"] h4,
   html[data-theme="dark"] h5,
   html[data-theme="dark"] h6,
   html[data-theme="dark"] label,
   html[data-theme="dark"] .control-label,
   html[data-theme="dark"] .form-label,
   html[data-theme="dark"] .table thead th {
       color: #fff !important;
   }

   html[data-theme="light"] h1,
   html[data-theme="light"] h2,
   html[data-theme="light"] h3,
   html[data-theme="light"] h4,
   html[data-theme="light"] h5,
   html[data-theme="light"] h6,
   html[data-theme="light"] label,
   html[data-theme="light"] .control-label,
   html[data-theme="light"] .form-label,
   html[data-theme="light"] .table thead th {
       color: var(--cfxm-purple, #49247e) !important;
   }
   </style>
   </head>
<div class="theme-switcher">
    <a class="switch-dark"><i class="fa fa-moon" style="margin-top: 15px; font-size: 20pt; color: var(--liner-text-color)"></i></a>

      
   </div>
<script>
const currentTheme=localStorage.getItem('theme') || 'dark';
 $('html').attr('data-theme', currentTheme);
 if(currentTheme=='dark'){
     $('html').attr('data-theme', currentTheme);
     $('.switch-dark').html(currentTheme==='dark' ? "<i class='fa fa-sun fa-spin spin' style='color: var(--liner-text-color); font-size: 20pt; margin-top: 15px'></i>" : "<i class='fa fa-moon' style='color: var(--liner-text-color); font-size: 20pt; margin-top: 15px'></i>");
    $('.lp_subtitle').html('<img class="navigation_logo front-banner" alt="Maxifxpro Investment-logo" src="../maxilogocolor.png"  style="width: 200px"/>');
 }else{
        $('.lp_subtitle').html('<img class="navigation_logo front-banner" alt="Maxifxpro Investment-logo" src="../maxilogowhite.png"  style="width: 200px"/>');
 
 }
 

$('.switch-dark').click(function(){
let theme = $('html').attr('data-theme');
let newTheme=theme === 'dark' ? 'light' : 'dark';
$('html').attr('data-theme', newTheme);
localStorage.setItem('theme', newTheme);
$('.switch-dark').html(newTheme==='dark'? "<i class='fa fa-sun fa-spin spin' style='color: var(--liner-text-color); font-size: 20pt; margin-top: 15px'></i>" : "<i class='fa fa-moon' style='color: var(--liner-text-color); font-size: 20pt; margin-top: 15px'></i>");

 if(theme=='dark'){
    $('.lp_subtitle').html('<img class="navigation_logo front-banner" alt="Maxifxpro Investment-logo" src="../maxilogocolor.png"  style="width: 200px"/>');
 }else{
    $('.lp_subtitle').html('<img class="navigation_logo front-banner" alt="Maxifxpro Investment-logo" src="../maxilogocolor.png"  style="width: 200px"/>');
 }
})
</script>

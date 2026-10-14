<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>

   :root{
       --bg-color: #fff;
        --bg-color2: #eee;
       --text-color: #222;
       --liner-text-color: #009ea7;
       --card-bg: #fff;
       --accent: #393E46;
       --body-bg: #fff;
       --nav-bg: #fff;
       --liner-bg: #fff;
       --box-color: rgba(18, 31, 39, 0.2);
   }
   
   [data-theme="dark"]{
       --bg-color: #0b161c;
        --bg-color2: #0b161c;

       --text-color: #DFD0B8;
       --card-bg: #222831;
       --accent: #393E46;
       --body-bg: #121f27;
       --nav-bg: #222831;
       --liner-bg: #393E46;
       --liner-text-color: #DFD0B8;
              --box-color: rgba(255, 255, 255, 0.2);

       
       
   }
       .theme-switcher{
           position: fixed;
           align-items: center;
           display: flex;
           left: 0;
           z-index: 99999;
           height: 100vh;
       }
       
       h1, h2, h3, h4, h5, h6 label, p, div{
           color: var(--liner-text-color);
       }
       
   </style>
   </head>
<div class="theme-switcher">
       <a class="switch-dark" style="background: #555; padding: 10px; color: white; cursor: pointer; text-decoration: none"> Switch Mode</a>
   </div>
<script>
const currentTheme=localStorage.getItem('theme');
 if(currentTheme=='dark'){
     $('html').attr('data-theme', currentTheme);
     $('.switch-dark').text(currentTheme==='dark' ? 'Light Mode' : 'Dark Mode').css({'color':'black'});
    $('.lp_subtitle').html('<img class="navigation_logo front-banner" alt="Maxifxpro Investment-logo" src="../maxilogocolor.png"  style="width: 200px"/>');
 }else{
        $('.lp_subtitle').html('<img class="navigation_logo front-banner" alt="Maxifxpro Investment-logo" src="../maxilogowhite.png"  style="width: 200px"/>');
 
 }
 

$('.switch-dark').click(function(){
let theme = $('html').attr('data-theme');
let newTheme=theme === 'dark' ? 'light' : 'dark';
$('html').attr('data-theme', newTheme);
localStorage.setItem('theme', newTheme);
$('.switch-dark').text(newTheme==='dark'? 'Light Mode' : 'Dark Mode').css({'color':'black'});
 if(theme=='dark'){
    $('.lp_subtitle').html('<img class="navigation_logo front-banner" alt="Maxifxpro Investment-logo" src="../maxilogocolor.png"  style="width: 200px"/>');
 }else{
    $('.lp_subtitle').html('<img class="navigation_logo front-banner" alt="Maxifxpro Investment-logo" src="../maxilogocolor.png"  style="width: 200px"/>');
 }
})
</script>

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
       }
       
       h1, h2, h3, h4, h5, h6 label, p, div{
           color: var(--liner-text-color);
       }
       
   </style>
   </head>
<div class="theme-switcher">
    <a class="switch-dark"><i class="fa fa-moon" style="margin-top: 15px; font-size: 20pt; color: var(--liner-text-color)"></i></a>

      
   </div>
<script>
const currentTheme=localStorage.getItem('theme');
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

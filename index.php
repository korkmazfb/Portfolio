<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `projecten`');

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mert Portfolio</title>
    <script  src="js/script.js" defer></script>
    <script src="js/main.js" defer></script>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <header id="header">
      <nav class="nav">
        <img src="img/logo.webp" alt="logo" />
        <ul>
          <li><a href="#header">HOME</a></li>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#work">WORK</a></li>
          <li><a href="#skills">SKILLS</a></li>
          <li><a href="#contact">CONTACT</a></li>
        </ul>
        <a href="index.php" class="nav_button"><img src="img/unitedd.svg" alt="flagicons united kingdoms"></a>
      </nav>
    </header>

    <section class="foto">
      <div class="logos">
        <img src="img/html.webp" alt="" />
        <img src="img/javascript.webp" alt="" />
        <img src="img/program.webp" alt="" />
      </div>
      <div class="text-box">
        <img src="img/boy2.webp" alt="boy" />
        <div>
          <h2 class="mert">Hello I am Mert</h2>
          <h2 class="mert">Web Developer</h2>
        </div>
      </div>
    </section>

    <main>
      <div class="spraak">
        <img class="spraak_img" src="img/profiel2.webp" width="50px" alt="mediacollege logo">    
        <h2>Make it Rain Speech to Text</h2>
        <h4 id="message">Press the button below, and start speaking</h4>
        <button class="spraak_button" onclick="startRecognition()">Speech to text</button>
        <div id="result" class="hide"></div>
        <div><img id="image1" class="hide"></div>
      </div>
      <section id="about" class="me">
        <h2>About Me</h2>
        <p>I know good code when is see it &#9757;</p>
      </section>

      <section class="about">
      <?php foreach($result as $row): ?>
        <div class="about1">
          <h3 class="h1"><?php echo $row['titel']; ?></h3>

          <figure class="p1">
            <img src="img/<?php echo $row['foto']; ?>" alt="work" width="100%" height="100%" />
          </figure>
          <p class="font"> <?php echo $row['beschrijving']; ?></p>
          <a class="button" href="details.php?id=<?php echo $row['id'];?>">Meer Info</a>
          </div>

          <?php endforeach ?>
      </section>
      

        <!-- <div class="about1">
          <h3 class="h2">DEVELEPOR &#9819;</h3>

          <figure class="p">
            <img
              src="img/dev.webp"
              alt="developer"
              width="100%"
              height="100%"
            />
          </figure>
          <p class="font">
            I was not really into the programming buissnes, because I didn't
            have a pc or laptop. after the fourth class I knew that I wanted to
            be a developer. and now I am in my first year as a developer and it
            is really cool!
          </p>
        </div>
        <div class="about1">
          <h3 class="h3">STUDENT &#9786;</h3>

          <figure class="p">
            <img
              src="img/student.webp"
              alt="student"
              width="100%"
              height="100%"
            />
          </figure>
          <p class="font">
            I was a student at Ijburg College for four years I did vmbo-t and I
            finished my exames in one time and good grades, after that I came to
            Media College to be a site developer and I really like it here.
          </p>
        </div>
      </section>-->
      <section id="work" class="project">
  
        <h2>MY WORK ♢</h2>
        <div class="filters">
          <div>
            <input id="checkbox-cssart" type="checkbox" class="filter" />
            <label for="checkbox-cssart" class="label">CSS-Art</label>
          </div>
          <div>
            <input id="checkbox-webvr" type="checkbox" class="filter" />
            <label for="checkbox-webvr" class="label">Webvr</label>
          </div>
          <div>
            <input id="checkbox-websites" type="checkbox" class="filter" />
            <label for="checkbox-websites" class="label">Websites</label>
          </div>
        </div>
       
        <div class="projecten">
          <a class="box" data-category="websites" href="http://32840.hosts1.ma-cloud.nl/museumBO/"
            ><img src="img/museum.webp" alt=""
          /></a>
          <a class="box" data-category="websites" href="http://32840.hosts1.ma-cloud.nl/blog/"
            ><img src="img/pikmin.webp" alt=""
          /></a>
          <a class="box" data-category="websites" href="http://32840.hosts1.ma-cloud.nl/Landingspage/"
            ><img src="img/japan.webp" alt=""
          /></a>
          <a class="box" data-category="websites" href="http://32840.hosts1.ma-cloud.nl/BO-dashboard/"
            ><img src="img/dash.webp" alt=""
          /></a>

          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/live-tijd/"
            ><img src="gif/ezgif.com-gif-maker.gif" alt=""
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/stopwatch/"
            ><img src="gif/ezgif.com-gif-maker-2.gif" alt=""
          /></a>
          <a class="box" data-category="webvr" href="http://32840.hosts1.ma-cloud.nl/vr-mine-box/"
            ><img src="gif/ezgif.com-gif-maker-3.gif" alt=""
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/eyes-live/"
            ><img src="img/oog.webp" alt=""
          /></a>

          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/Hoothoot/"
            ><img src="gif/ezgif.com-gif-maker-4.gif" alt=""
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/post-its/"
            ><img src="gif/ezgif.com-gif-maker-5.gif" alt=""
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/Switch/"
            ><img src="gif/ezgif.com-gif-maker-6.gif" alt=""
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/TextBubble/"
            ><img src="gif/ezgif.com-gif-maker-7.gif" alt=""
          /></a>
        </div>
      </section>
      <section id="skills" class="skills">
        <h2>MY SKILLS &#9883;</h2>
        <div>
          <article class="card">
            <figure class="card_figure">
              <img src="img/html2.webp" alt="html logo" />
            </figure>
            <section class="card_body">
              <ul class="card_categories">
                <li class="card_category card_category--controller">Code</li>
                <li class="card_category card_category--ps4">HTML</li>
                <li class="card_category card_category--ps5">Programming</li>
              </ul>
              <header>
                <h2 class="card_heading">my skills with HTML Code.</h2>
              </header>
              <p class="card_p">
                My code skills with HTML is not that bad and not that good, but
                I know a lot of code in HTML and I know how to make a good
                looking site.
              </p>
            </section>
            <footer class="card_footer">
              <img class="card_pf" src="img/profiel2.webp" alt="profiel foto" />
              <div>
                <h3>Mert Korkmaz</h3>
                <p>3 uur geleden</p>
              </div>
            </footer>
          </article>
          <article class="card">
            <figure class="card_figure">
              <img src="img/css2.webp" alt="css logo" />
            </figure>
            <section class="card_body">
              <ul class="card_categories">
                <li class="card_category card_category--controller">Code</li>
                <li class="card_category card_category--ps4">CSS</li>
                <li class="card_category card_category--ps5">Programming</li>
              </ul>
              <header>
                <h2 class="card_heading">my skills with CSS Code.</h2>
              </header>
              <p class="card_p">
                My code skills with CSS are very good, because I like CSS very
                much. I like to code with CSS, because it's so powerful and
                really helpful in your site.
              </p>
            </section>
            <footer class="card_footer">
              <img class="card_pf" src="img/profiel2.webp" alt="profiel foto" />
              <div>
                <h3>Mert Korkmaz</h3>
                <p>1 dag geleden</p>
              </div>
            </footer>
          </article>
          <article class="card">
            <figure class="card_figure">
              <img src="img/javascript2.webp" alt="javascript logo" />
            </figure>
            <section class="card_body">
              <ul class="card_categories">
                <li class="card_category card_category--controller">code</li>
                <li class="card_category card_category--ps4">Javascript</li>
                <li class="card_category card_category--ps5">programming</li>
              </ul>
              <header>
                <h2 class="card_heading">my skills with Javascript Code.</h2>
              </header>
              <p class="card_p">
                My code skills with Javascript are not that good, because I find
                it very difficult and I make a lot of mistakes in Javascript I
                still need to learn a lot.
              </p>
            </section>
            <footer class="card_footer">
              <img class="card_pf" src="img/profiel2.webp" alt="profiel foto" />
              <div>
                <h3>Mert Korkmaz</h3>
                <p>4 dagen geleden</p>
              </div>
            </footer>
          </article>
        </div>
      </section>
      <section class="contact" id="contact">
      <h2>CONTACT ₵</h2>
      </section>
      

    </main>
    <a class="top" href="#header">Top</a>
  </body>
</html>

<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `projecten`');

$voornaam = '';
$achternaam = '';
$email = '';
$bericht = '';

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];
    $tijdstip = date('Y-m-d H:i:s');

    if( isEmpty($voornaam) ){
        $errors['voornaam'] = 'Fill in your name please.';
    }
    if( isEmpty($achternaam) ){
        $errors['achternaam'] = 'Fill in your surname please.';
    }
    if(!isValidEmail($email)){
        $errors['email'] = 'This in not a valid E-mail adress!';
    }
    if( !hasMinLength($bericht, 5) ){
        $errors['bericht'] = 'Fill in at least 5 characters.';


    }

    if(count($errors) == 0){
        $sql = "INSERT INTO `berichten` ( `voornaam`, `achternaam`, `email`, `bericht`, `tijdstip`)
            VALUES ( :voornaam, :achternaam, :email, :bericht, :tijdstip);";

        $statement = $connection->prepare($sql);
        $params = [
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'email' => $email,
        'bericht' => $bericht,
        'tijdstip' => $tijdstip
        ];        

        $statement->execute($params);
        header('location: bedankt.html');
        exit;
}
    

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mert Portfolio</title>
    <script  src="js/script2.js" defer></script>
    <script src="js/main.js" defer></script>
    <script src="js/review.js" defer></script>
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
          <li><a href="#reviews">REVIEWS</a></li>
          <li><a href="#contact">CONTACT</a></li>
        </ul>
        <a href="nl.php" class="nav_button"><img src="img/nl.svg" alt="flagicons netherlands"></a>
      </nav>
    </header>

    <section class="foto">
      <div class="logos">
        <img src="img/html.webp" alt="html logo" />
        <img src="img/javascript.webp" alt="javascript logo" />
        <img src="img/program.webp" alt="porgram logo" />
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
          <a class="button" href="details.php?id=<?php echo $row['id'];?>">More Info</a>
          </div>

          <?php endforeach ?>
      </section>
      
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
            ><img src="img/museum.webp" alt="museum site"
          /></a>
          <a class="box" data-category="websites" href="http://32840.hosts1.ma-cloud.nl/blog/"
            ><img src="img/pikmin.webp" alt="pikmin site"
          /></a>
          <a class="box" data-category="websites" href="http://32840.hosts1.ma-cloud.nl/Landingspage/"
            ><img src="img/japan.webp" alt="japan site"
          /></a>
          <a class="box" data-category="websites" href="http://32840.hosts1.ma-cloud.nl/BO-dashboard/"
            ><img src="img/dash.webp" alt="dashboard site"
          /></a>

          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/live-tijd/"
            ><img src="gif/ezgif.com-gif-maker.gif" alt="css art image 1"
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/stopwatch/"
            ><img src="gif/ezgif.com-gif-maker-2.gif" alt="css art image 2"
          /></a>
          <a class="box" data-category="webvr" href="http://32840.hosts1.ma-cloud.nl/vr-mine-box/"
            ><img src="gif/ezgif.com-gif-maker-3.gif" alt="webvr image "
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/eyes-live/"
            ><img src="img/oog.webp" alt="css image oog"
          /></a>

          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/Hoothoot/"
            ><img src="gif/ezgif.com-gif-maker-4.gif" alt="css art image 3"
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/post-its/"
            ><img src="gif/ezgif.com-gif-maker-5.gif" alt="css art image 4"
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/Switch/"
            ><img src="gif/ezgif.com-gif-maker-6.gif" alt="css art image 5"
          /></a>
          <a class="box" data-category="cssart" href="http://32840.hosts1.ma-cloud.nl/TextBubble/"
            ><img src="gif/ezgif.com-gif-maker-7.gif" alt="css art image 6"
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
                <h2 class="card_heading">My skills with HTML Code.</h2>
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
                <p>3 hours ago</p>
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
                <h2 class="card_heading">My skills with CSS Code.</h2>
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
                <p>1 day ago</p>
              </div>
            </footer>
          </article>
          <article class="card">
            <figure class="card_figure">
              <img src="img/javascript2.webp" alt="javascript logo" />
            </figure>
            <section class="card_body">
              <ul class="card_categories">
                <li class="card_category card_category--controller">Code</li>
                <li class="card_category card_category--ps4">Javascript</li>
                <li class="card_category card_category--ps5">Programming</li>
              </ul>
              <header>
                <h2 class="card_heading">My skills with Javascript Code.</h2>
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
                <p>4 days ago</p>
              </div>
            </footer>
          </article>
        </div>
      </section>
      <section class="review_body" id="reviews">
      <h2>REVIEWS ₵</h2>
    <section  class="section section--third">
        <button class="arrow"></button>
        <ul class="reviews">
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733;</section>
            <p>
              1. One of the best people in the development buissnes.
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733; &#9733;</section>
            <p>
              2. I love this guy, beacuse of him I have 
              a good site for my buissnes. Now I know what
              people think about my comapny thank you Mert. 
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733;</section>
            <p>
              3. This guy is one of my old school mates he made 
                a real;y sick site for me so people can hire me.
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733; &#9733; &#9733;</section>
            <p>
              4. This guy is amazing I asked him for a webshop for
                the company immedatly after 3 days he got the job 
                done.
              
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9; ;</section>
            <p>
              5. This guy made a cool site for me.
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733; &#9733; </section>
            <p>
              6. I really like this guy, because he informed me everyday 
                about what is happening in the site and what he is doing
                everyday for my site.
            </p>
          </li>
        </ul>
        <button class="arrow">></button>
      </section>
      </section>


      <section id="contact" class="contact">
        <h2>CONTACT ©</h2>
      </section>
    
<section id="contact" class="contact_head">
          

            <header class="contact_header">
                <h2> Have a question?</h2>
            </header>

            <form action="index.php#contact"  method="POST" novalidate>
                <div class="contact_form">
                    <label for="voornaam">Name</label>
                    <input type="text" value="<?php echo $voornaam;?>" id="voornaam" name="voornaam" placeholder="Fill in your name" required>

                    <?php if(!empty($errors['voornaam'])):?>
                        <p class="form_error"><?php echo $errors['voornaam']?></p>
                    <?php endif;?>

                </div>
                <div class="contact_form">
                    <label for="achternaam">Surname</label>
                    <input type="text" value="<?php echo $achternaam;?>" id="achternaam" name="achternaam" placeholder="Fill in your last name" required>
                    <?php if(!empty($errors['achternaam'])):?>
                        <p class="form_error"><?php echo $errors['achternaam']?></p>
                    <?php endif;?>
                </div>
                <div class="contact_form">
                    <label for="email">E-mail</label>
                    <input type="email" value="<?php echo $email;?>" id="email" name="email" placeholder="Fill in your E-mail adress" required>
                    <?php if(!empty($errors['email'])):?>
                        <p class="form_error"><?php echo $errors['email']?></p>
                    <?php endif;?>
                </div>
                <div class="contact_form">
                    <label for="bericht">Message</label>
                    <textarea id="bericht" name="bericht" placeholder="Fill in your question or message" required><?php echo $bericht;?></textarea>
                    <?php if(!empty($errors['bericht'])):?>
                        <p class="form_error"><?php echo $errors['bericht']?></p>
                    <?php endif;?>
                    <button type="submit" class="contact_button">Send</button>
                </div>
                

            </form>

        </section>
    </div>
      

    </main>
    <a class="top" href="#header">Top</a>



    <footer class="footer">
      <a href="https://www.linkedin.com/in/mert-korkmaz-a09b8423b/"><img  class="footer_img" src="img/profiel2.webp" alt="logo profiel"></a>
      <div class="footer_text">
        <h2 class="footer_h2">Created by Mert Korkmaz 🕵️‍♂️</h2>
        <p class="footer_info">Mediacollege Amsterdam Student 😆</p>
        <p class="footer_info">16 Years old 💪</p>
        <p class="footer_info">1 Year experience in code 🧑‍💻</p>
      </div>

    </footer>
  </body>
</html>

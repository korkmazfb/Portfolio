<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `projecten-nederlands`');

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
        $errors['voornaam'] = 'Vul uw voornaam in a.u.b.';
    }
    if( isEmpty($achternaam) ){
        $errors['achternaam'] = 'Vul uw achternaam in a.u.b.';
    }
    if(!isValidEmail($email)){
        $errors['email'] = 'Dit is geen geldig Email-adres!';
    }
    if( !hasMinLength($bericht, 5) ){
        $errors['bericht'] = 'Vul minimaal 5 tekens in.';


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
        header('Location: bedankt2.html');
        exit;
}
    

}

?>





<!DOCTYPE html>
<html lang="nl">
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
          <li><a href="#work">WERK</a></li>
          <li><a href="#skills">SKILLS</a></li>
          <li><a href="#reviews">REVIEWS</a></li>
          <li><a href="#contact">CONTACT</a></li>
        </ul>
        <a href="index.php" class="nav_button"><img  src="img/gb.svg" alt="flagicons netherlands"></a>
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
          <h2 class="mert">Hallo ik ben Mert</h2>
          <h2 class="mert">Web Developer</h2>
        </div>
      </div>
    </section>

    <main>
      <div class="spraak">
        <img class="spraak_img" src="img/profiel2.webp" width="50px" alt="mediacollege logo">    
        <h2>Make it Rain spraak naar text</h2>
        <h4 id="message">Druk op de onderstaande knop, en begin met spreken</h4>
        <button class="spraak_button" onclick="startRecognition()">Spraak naar text</button>
        <div id="result" class="hide"></div>
        <div><img id="image1" class="hide"></div>
      </div>
      <section id="about" class="me">
        <h2>Over mij</h2>
        <p>Ik ken een goede code wanneer ik hem zie &#9757;</p>
      </section>

      <section class="about">
      <?php foreach($result as $row): ?>
        <div class="about1">
          <h3 class="h1"><?php echo $row['titel']; ?></h3>

          <figure class="p1">
            <img src="img/<?php echo $row['foto']; ?>" alt="work" width="100%" height="100%" />
          </figure>
          <p class="font"> <?php echo $row['beschrijving']; ?></p>
          <a class="button" href="details-nl.php?id=<?php echo $row['id'];?>">Meer Info</a>
          </div>

          <?php endforeach ?>
      </section>
      
      <section id="work" class="project">
  
        <h2>MIJN WERK ♢</h2>
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
        <h2>MIJN SKILLS &#9883;</h2>
        <div>
          <article class="card">
            <figure class="card_figure">
              <img src="img/html2.webp" alt="html logo" />
            </figure>
            <section class="card_body">
              <ul class="card_categories">
                <li class="card_category card_category--controller">Code</li>
                <li class="card_category card_category--ps4">HTML</li>
                <li class="card_category card_category--ps5">Programmeren</li>
              </ul>
              <header>
                <h2 class="card_heading">Mijn skills met HTML Code.</h2>
              </header>
              <p class="card_p">
                Mijn codevaardigheden met HTML zijn niet zo slecht en niet zo goed, maar
                Ik ken veel code in HTML en ik weet hoe ik een goed kijkende site. 
                moet maken
                
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
                <li class="card_category card_category--ps5">Programmeren</li>
              </ul>
              <header>
                <h2 class="card_heading">Mijn skills met CSS Code.</h2>
              </header>
              <p class="card_p">
                Mijn codevaardigheden met CSS zijn erg goed, omdat ik erg van CSS houd.
                Ik codeer graag met CSS, omdat het zo krachtig en
                echt nuttig in uw site.
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
                <li class="card_category card_category--ps5">Programmeren</li>
              </ul>
              <header>
                <h2 class="card_heading">Mijn skills met Javascript Code.</h2>
              </header>
              <p class="card_p">
                Mijn codevaardigheden met Javascript zijn niet zo goed, omdat ik vind
                dat het erg moeilijk is en ik maak veel fouten in Javascript en daarom
                moet ik nog veel leren.
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
      <section class="review_body" id="reviews">
      <h2>REVIEWS ₵</h2>
    <section  class="section section--third">
        <button class="arrow"></button>
        <ul class="reviews">
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733;</section>
            <p>
              1. Een van de beste mensen in de ontwikkeling van buissnes.
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733; &#9733;</section>
            <p>
              2. Ik hou van deze man, omdat door hem heb ik
              een goede site voor mijn buissnes. Nu weet ik wat
              mensen denken over mijn bedrijf bedankt Mert.
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733;</section>
            <p>
                3. Deze man is een van mijn oude schoolvrienden hij heeft echt
                een zieke site voor mij gemaakt, zodat mensen me kunnen inhuren.
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733; &#9733; &#9733;</section>
            <p>
                4. Deze man is geweldig. Ik vroeg hem om een webshop voor
                het bedrijf onmiddellijk na 3 dagen kreeg hij de baan
                gedaan.
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9; ;</section>
            <p> 
              5. Deze man heeft een coole site voor me gemaakt.
            </p>
          </li>
          <li class="review">
            <figure class="quote">&#10077;</figure>
            <section class="stars">&#9733; &#9733; &#9733; &#9733; </section>
            <p>
            6. Ik vind deze man echt leuk, omdat hij me elke dag op de hoogte bracht
                over wat er op de site gebeurt en wat hij doet
                elke dag voor mijn site doet.
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
                <h2> Heb je een vraag?</h2>
            </header>

            <form action="nl.php#contact"  method="POST" novalidate>
                <div class="contact_form">
                    <label for="voornaam">Naam</label>
                    <input type="text" value="<?php echo $voornaam;?>" id="voornaam" name="voornaam" placeholder="Vul je naam in" required>

                    <?php if(!empty($errors['voornaam'])):?>
                        <p class="form_error"><?php echo $errors['voornaam']?></p>
                    <?php endif;?>

                </div>
                <div class="contact_form">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" value="<?php echo $achternaam;?>" id="achternaam" name="achternaam" placeholder="vul je achternaam in" required>
                    <?php if(!empty($errors['achternaam'])):?>
                        <p class="form_error"><?php echo $errors['achternaam']?></p>
                    <?php endif;?>
                </div>
                <div class="contact_form">
                    <label for="email">E-mail</label>
                    <input type="email" value="<?php echo $email;?>" id="email" name="email" placeholder="vul je E-mail adress in" required>
                    <?php if(!empty($errors['email'])):?>
                        <p class="form_error"><?php echo $errors['email']?></p>
                    <?php endif;?>
                </div>
                <div class="contact_form">
                    <label for="bericht">Bericht</label>
                    <textarea id="bericht" name="bericht" placeholder="Vul je vraag of bericht in" required><?php echo $bericht;?></textarea>
                    <?php if(!empty($errors['bericht'])):?>
                        <p class="form_error"><?php echo $errors['bericht']?></p>
                    <?php endif;?>
                    <button type="submit" class="contact_button">Opsturen</button>
                </div>
                

            </form>

        </section>
    </div>

    </main>
    <a class="top" href="#header">Top</a>

    <footer class="footer">
    <a href="https://www.linkedin.com/in/mert-korkmaz-a09b8423b/"><img  class="footer_img" src="img/profiel2.webp" alt="logo profiel"></a>
      <div class="footer_text">
        <h2 class="footer_h2">Gemaakt door Mert Korkmaz 🕵️‍♂️</h2>
        <p class="footer_info">Mediacollege Amsterdam Student 😆</p>
        <p class="footer_info">16 jaar oud 💪</p>
        <p class="footer_info">1 jaar ervaring in code 🧑‍💻</p>
      </div>
    </footer>
  </body>
</html>

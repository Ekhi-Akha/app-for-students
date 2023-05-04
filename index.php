<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="book.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="custom.css" />
  <title>Home</title>
</head>

<?php
session_start();
if (isset($_SESSION["username"])) {
  header("Location: /app-for-students/home");
  exit();
}
?>

<body>
  <div id="app">
    <nav class="container">
      <ul>
        <li><a href="/app-for-students" class="contrast"><strong>Edu.ISI</strong></a></li>
      </ul>
      <ul>
        <li><a href="register">Create new account</a></li>
        <li><a href="login" role="button">Login</a></li>
        <li>
          <a href="#" class="secondary outline sun" role="button" style="border: none;" data-theme-switcher="light">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path fill-rule="evenodd"
                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                clip-rule="evenodd"></path>
            </svg>
          </a>
        </li>
        <li>
          <a href="#" class="secondary outline moon" role="button" style="border: none;" data-theme-switcher="dark">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
          </a>
        </li>
      </ul>
    </nav>
    <main class="container">
      <div class="grid" style="margin-top: 2rem">
        <section>
          <h1 id="hero-title">A Gateway<br>Into<br><span style="color: #1095C1;">Community</span><br>Life</h1>
          <p>Join the community of students, faculty, and staff at the Higher Institute of Informatics.</p>
          <a href="/app-for-students/tos" role="button">Learn More</a>
          <h3><span id="counter"></span>+ Students joined already</h3>
        </section>
        <section class="parent">
          <div class="div1"><img src="public/Rectangle_6.png" alt="student with glasses"></div>
          <div class="div2"><img src="public/Rectangle_4.png" alt="student concentrating"></div>
          <div class="div3"><img src="public/Rectangle_5.png" alt="class"></div>
          <div class="div4"><img src="public/Rectangle_7.png" alt="student holding book"></div>
        </section>
      </div>
      <div class="grid">
        <article>
          <img src="public/card_1.png" alt="">
          <hgroup>
            <h2>Get Help. Anytime.</h2>
            <p>Get help from our community of students, faculty, and staff.</p>
          </hgroup>
        </article>
        <article>
          <img src="public/card_2.png" alt="">
          <hgroup>
            <h2>Get Involved</h2>
            <p>Get involved in the community of students, faculty, and staff and make a difference.</p>
          </hgroup>
        </article>
        <article>
          <img src="public/card_3.png" alt="">
          <hgroup>
            <h2>Succeed</h2>
            <p>The road to success is paved with the help of our community.</p>
          </hgroup>
        </article>
      </div>
      <div>
        <h2 style="margin: 0;">What our students are saying about us.</h2>
        <section class="grid">
          <article class="testimonial">
            <img src="./public/portrait-man-laughing-min.jpg" alt="">
            <hgroup>
              <h3>Youssef Hamdi</h3>
              <h4>Student</h4>
            </hgroup>
            <p>“I really like the community of students, faculty, and staff at the Higher Institute of Informatics. I
              have
              made a lot of friends and I have learned a lot from them.”</p>
          </article>
          <article class="testimonial">
            <img
              src="./public/young-beautiful-woman-pink-warm-sweater-natural-look-smiling-portrait-isolated-long-hair-min.jpg"
              alt="">
            <hgroup>
              <h3>Maram Benarbi</h3>
              <h4>Student</h4>
            </hgroup>
            <p>”This is a great place to learn and grow. I have learned a lot from the community of students, faculty,
              and
              staff at the Higher Institute of Informatics.”</p>
          </article>
          <article class="testimonial">
            <img src="./public/portrait-white-man-isolated-min.jpg" alt="">
            <hgroup>
              <h3>Ahmed Sallemi</h3>
              <h4>Student</h4>
            </hgroup>
            <p> I never thought I would be able to learn so much from the community of students, faculty, and staff at
              the
              Higher Institute of Informatics. I have learned a lot and I have made a lot of friends.”</p>
          </article>
        </section>
    </main>
    <footer>
      <div class="container">
        <div class="grid">
          <section>
            <h2>Get in touch</h2>
            <p>Get in touch with us and we'll get back to you as soon as possible.</p>
            <a href="https://github.com/Ekhi-Akha" target="_blank" role="button">Contact Us</a>
          </section>

          <section>
            <h2>Legal</h2>
            <ul>
              <li><a href="/app-for-students/tos">Terms of Service</a></li>
              <li><a href="/app-for-students/privacy-policy">Privacy Policy</a></li>
            </ul>
          </section>
        </div>
      </div>
    </footer>
  </div>

  <script type="module" src="main.js"></script>

  <script src="js/minimal-theme-switcher.js"></script>
</body>

</html>
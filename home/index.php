<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/svg+xml" href="/app-for-students/book.svg" />
  <title>Home</title>
</head>

<body>
  <nav class="container">
    <ul>
      <li><a href="/app-for-students" class="contrast"><strong>Edu.ISI</strong></a></li>
    </ul>
    <ul>
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
  <header class="container">
    <div class="nav">
      <div class="container">
        <input type="search" id="search" name="search" autocomplete="email" placeholder="Find Student">
        <ul class="students-list">
        </ul>
      </div>
      <div class="name-img-container">
        <b>John Doe</b>
        <img src="https://randomuser.me/api/portraits/men/86.jpg" alt="profile" class="rounded">
      </div>
    </div>
    </div>
  </header>
  <main class="container">
    <article class="question">
      <div class="question-header">
        <h2>Subject: <a href="#">Mathematics</a></h2>
        <h3>Question Title</h3>
        <p class="details"> <small><em>Asked by <b>John Doe</b> on 12/12/2021</em></small> </p>
      </div>
      <div class="question-body">
        <p class="question-content">Why is the sky blue?</p>
      </div>
      <div class="question-footer">
        <div class="votes">
          <span class="vote upvote">
            <svg width="36" height="36" class="vote-svg upvote-svg">
              <path d="M2 10h32L18 26 2 10z" fill="currentColor" class="vote-path upvote-path">
              </path>
            </svg>
          </span>

          <p class="vote-count">0</p>

          <span class="vote downvote">
            <svg width="36" height="36" class="vote-svg downvote-svg">
              <path d="M2 10h32L18 26 2 10z" fill="currentColor" class="vote-path downvote-path">
              </path>
            </svg>
          </span>

          <p class="vote-count">0</p>

        </div>
      </div>

      <div class="answers">
        <h4>Answers</h4>
        <div class="answer">
          <p class="answer-content">Answer is because of the sun and the atmosphere</p>
          <div class="votes">
            <span class="vote upvote">
              <svg width="36" height="36" class="vote-svg upvote-svg">
                <path d="M2 10h32L18 26 2 10z" fill="currentColor" class="vote-path upvote-path">
                </path>
              </svg>
            </span>
            <p class="vote-count">0</p>
            <span class="vote downvote">
              <svg width="36" height="36" class="vote-svg downvote-svg">
                <path d="M2 10h32L18 26 2 10z" fill="currentColor" class="vote-path downvote-path">
                </path>
              </svg>
            </span>
            <p class="vote-count">0</p>
          </div>
        </div>
        <div class="answer">
          <p class="answer-content">This answer is better than the previous one because it has more upvotes</p>
          <div class="votes">
            <span class="vote upvote">
              <svg width="36" height="36" class="vote-svg upvote-svg">
                <path d="M2 10h32L18 26 2 10z" fill="currentColor" class="vote-path upvote-path">
                </path>
              </svg>
            </span>
            <p class="vote-count">0</p>
            <span class="vote downvote">
              <svg width="36" height="36" class="vote-svg downvote-svg">
                <path d="M2 10h32L18 26 2 10z" fill="currentColor" class="vote-path downvote-path">
                </path>
              </svg>
            </span>
            <p class="vote-count">0</p>
          </div>
        </div>
      </div>
      <form action="/login" class="answer-form">
        <input class="answer-input" type="text" placeholder="Answer the question">
        <button type="submit">Answer</button>
      </form>
    </article>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM app_for_students.question";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {
      // get student using student_id from student table
      $student = mysqli_query($conn, "SELECT * FROM app_for_students.student WHERE id = " . $row['student_id']);
      $student = mysqli_fetch_assoc($student);
      // get answer related to the question
      $sql = "SELECT * FROM app_for_students.answer WHERE question_id = " . $row['id'];
      $answers = mysqli_query($conn, $sql);
      // $answer = mysqli_fetch_assoc($answer);
    
      // echo "<br>student: " . json_encode($student);
      // print the $row array as json
      // echo "<br>question: " . json_encode($row);
      // echo $row['id'];
      echo "
 <article  class='question' id='" . $row['id'] . "'>
      <div class='question-header'>
        <h2>Subject: <a href='#'>Mathematics</a></h2>
        <h3>" . $row['title'] . "</h3>
        <p class='details'> <small><em>Asked by <b>" . $student['username'] . "</b> on " . substr($row['created_at'], 0, 10) . "</em></small> </p>
      </div>
      <div class='question-body'>
        <p class='question-content'>" . $row['question'] . "</p>
      </div>
      <div class='question-footer'>
        <div class='votes'>
          <span class='vote upvote'>
            <svg width='36' height='36' class='vote-svg upvote-svg'>
              <path d='M2 10h32L18 26 2 10z' fill='currentColor' class='vote-path upvote-path'>
              </path>
            </svg>
          </span>

          <p class='vote-count'>0</p>

          <span class='vote downvote'>
            <svg width='36' height='36' class='vote-svg downvote-svg'>
              <path d='M2 10h32L18 26 2 10z' fill='currentColor' class='vote-path downvote-path'>
              </path>
            </svg>
          </span>
          <p class='vote-count'>0</p>

        </div>
      </div>

      <div class='answers'>
        <h4>Answers</h4>";
      while ($answer = mysqli_fetch_assoc($answers)) {
        echo "
        <div class='answer'>
          <p class='answer-content'>" . $answer['answer'] . "</p>
          <div class='votes'>
            <span class='vote upvote'>
              <svg width='36' height='36' class='vote-svg upvote-svg'>
                <path d='M2 10h32L18 26 2 10z' fill='currentColor' class='vote-path upvote-path'>
                </path>
              </svg>
            </span>
            <p class='vote-count'>0</p>
            <span class='vote downvote'>
              <svg width='36' height='36' class='vote-svg downvote-svg'>
                <path d='M2 10h32L18 26 2 10z' fill='currentColor' class='vote-path downvote-path'>
                </path>
              </svg>
            </span>
            <p class='vote-count'>0</p>
          </div>
        </div>";
      }
      echo
        "<form action='/login' class='answer-form'>
          <input class='answer-input' type='text' placeholder='Answer the question'>
          <button type='submit'>Answer</button>
        </form>
      </article>
      ";


    }

    ?>

  </main>

  <script type="module" src="index.js"></script>
  <script src="../js/minimal-theme-switcher.js"></script>
</body>

</html>
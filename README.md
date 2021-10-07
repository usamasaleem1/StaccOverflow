# SOEN341

## About
Code reviews from people around the world is a great way to learn, share and improve your code and projects fast and seamlessly. Here, people can share their code, suggest changes, as well as upvote/downvote posts to gain more traction to solve popular problems software developers around the world face. itsafeaturenotabug will be this, a code sharing platform akin to StackOverflow to allow people to publish and share their code for problems and otherwise.

## Objective 
Develop a simplified version of Stack Overflow website where different people can post their questions and get answer to their queries. Users can vote on answers and depending on votes best answer is selected.

## Core Features
1. Asking and answering questions
2. Voting on answer
3. Accepting the best answer

## How to setup to project (Backend)

1. Clone the repo
2. Insure that you have PHP installed on your PC by running the command <code>php -v</code> in the terminal. You should get a number printed in the console. If not, google "How to install php"
3. Download and install composer from <a href="https://getcomposer.org/download/">here</a>
4. Open a CMD in the folder called <b>Backend</b> inside the folder you just clone the repo in
5. Type <code>npm --version</code>. You should get a number printed. If not you need to download
   NodeJS from here https://nodejs.org/en/download/
6. Now that you have composer and npm installed. Open a terminal in the <b>Backend</b> folder. And run the command <code>composer install</code>
7. Now follow the steps below <i>Setting up the connection with a MySQL database</i>
8. After you have followed those steps, run <code>php artisan migrate</code>
9. Once finished your app is ready to go. Just run <code>php artisan serve</code>
10. Navigate to http://localhost:8000 and you should see the welcome page

## Setting up the connection with a MySQL database:

1. Open your desired MySQL server (e.g. XAMMP, WAMP, etc)
2. create a database called <code>soen341</code>
3. Copy the <i>.example.env</i> file (located in the <u>Backend</u> folder) and rename it to <i>.env</i>
4. Enter your own server values for username, password, port, etc in the <i>.env</i> file
5. Run the nodeJS server if it is not already running (using the commands in step 7 above)

## Technologies used
* Laravel (PHP)
* MySQL
* Blade template language

## Team Members

1. Shadi Jiha (shadijiha) <b>Leader</b>
2. Uzair Ali (uzairali245)
3. Mehdi Chitsaz (mehdichitsaz)
4. Usama Saleem (usamasaleem1)
5. Yacin Jouiad (Evowox)
6. Alexandre Hakim (alexhakim)
7. Victor Manuel Guerra (vimaguelo)

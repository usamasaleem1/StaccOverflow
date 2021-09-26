# SOEN341

## How to setup to project (Backend)

1. Clone the repo
2. Open a CMD in the folder called <b>Backend</b> inside the folder you just clone the repo in
3. Type <code>npm --version</code>. You should get a number printed. If not you need to download
   NodeJS from here https://nodejs.org/en/download/
4. Now that you have NPM installed. Type <code>npm i -g @nestjs/cli</code> in the CMD you opened in step 2 and wait until its done.
5. Now Type <code>npm install</code> in the CMD you opened in step 2.
6. <b>IMPORTANT</b>: Follow the steps below to setup the connection with the database before you continue.
7. Now type <code>npm run start:dev</code> in the same CMD.
8. Now you are ready! Every time you modify a file the server will automatically restart itself to apply the changes
   Keep an eye on the CMDs because any error will appear there.

## Setting up the connection with a MySQL database:

1. Open your desired MySQL server (e.g. XAMMP, WAMP, etc)
2. create a database called <code>soen341</code>
3. Copy the <i>.example.env</i> file (located in the <u>Backend</u> folder) and rename it to <i>.env</i>
4. Enter your own server values for username, password, port, etc in the <i>.env</i> file
5. Run the nodeJS server if it is not already running (using the commands in step 7 above)

## Technologies used
* Typescript (both frontend and backend)
* NestJS (backend)
* MySQL with type-orm (backend)
* React (frontend)

## Team Members

1. Uzair Ali
2. Mehdi Chitsaz
3. Usama Saleem
4. Yacin Jouiad
5. Shadi Jiha (jshad0 and shadijiha accounts)
6. Alexandre Hakim
7. Victor Manuel Guerra

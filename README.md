# SOEN341

## How to setup to project (Backend)

1. Clone the repo
2. Open a CMD in the folder called <b>Backend</b> inside the folder you just clone the repo in
3. Type <code>npm --version</code>. You should get a number printed. If not you need to download
   NodeJS from here https://nodejs.org/en/download/
4. Now that you have NPM installed. Type <code>npm install</code> in the CMD you opened in step 2.
5. Now type <code>npm run watch</code> in the same CMD.
6. Open another CMD in the same folder (<b>Backend</b>) and type <code>npm run dev</code>
7. Now you are ready! Every time you modify a file the server will automatically restart itself to apply the changes
   Keep an eye on the CMDs because any error will appear there.

## Setting up the connection with a MySQL database:

1. Open your desired MySQL server (e.g. XAMMP, WAMP, etc)
2. create a database called <code>soen341</code>
3. Copy the <i>.example.env</i> file (located in the <u>Backend</u> folder) and rename it to <i>.env</i>
4. Enter your own server values for username, password, port, etc in the <i>.env<i> file
5. Run the nodeJS server if it is not already running (using the commands in setp 5 and 6 above)

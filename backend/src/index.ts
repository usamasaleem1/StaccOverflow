import "reflect-metadata";
import express from "express";
import { createConnection, Connection } from "typeorm";
import { User } from "./models/User";

async function main() {
	const PORT = 7000;
	const app = express();

	// Making the database connection
	const connection = await createConnection({
		type: "mysql",
		host: "localhost",
		port: 3306,
		username: "root",
		password: "",
		database: "soen341",
		synchronize: true,
		entities: [User],
	});

	// All API Routes should be defined here
	app.get("/", (req, res) => res.send("Hello this is the index API route!"));

	// Start the server
	app.listen(PORT, () =>
		console.log(`Server is listening to http://localhost:${PORT}/`)
	);
}

main().catch((e) => console.error(e));

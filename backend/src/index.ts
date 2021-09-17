import "reflect-metadata";
import express from "express";
import { createConnection, Connection } from "typeorm";
import { User } from "./models/User";
import dotenv from "dotenv";

async function main() {
	dotenv.config();

	const PORT = process.env.APP_PORT;
	const app = express();

	// Making the database connection
	const connection = await createConnection({
		type: "mysql",
		host: process.env.DB_HOST,
		port: Number(process.env.DB_PORT || 3306),
		username: process.env.DB_USERNAME,
		password: process.env.DB_PASSWORD,
		database: process.env.DB_NAME,
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

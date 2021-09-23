import "reflect-metadata";
import { NestFactory } from "@nestjs/core";
import { AppModule } from "./app.module";

async function bootstrap() {
	// Creating the Server
	const app = await NestFactory.create(AppModule);
	const PORT = process.env.APP_PORT;
	await app.listen(PORT);
}
bootstrap();

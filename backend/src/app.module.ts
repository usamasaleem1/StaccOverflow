import { Module } from "@nestjs/common";
import { TypeOrmModule } from "@nestjs/typeorm";
import { MainController } from "./controllers/MainController";
import { User } from "./models/User";
import { MainService } from "./services/MainService";
import { ConfigModule } from "@nestjs/config";
import { Question } from "./models/Question";

@Module({
	controllers: [MainController],
	providers: [MainService],
	imports: [
		ConfigModule.forRoot(),
		TypeOrmModule.forRoot({
			type: "mysql",
			host: process.env.DB_HOST,
			port: Number(process.env.DB_PORT || 3306),
			username: process.env.DB_USERNAME,
			password: process.env.DB_PASSWORD,
			database: process.env.DB_NAME,
			synchronize: true,
			entities: [User, Question],
		}),
	],
})
export class AppModule {}

import { Controller, Get } from "@nestjs/common";
import { MainService } from "../services/MainService";

@Controller()
export class MainController {
	constructor(private readonly appService: MainService) {}

	@Get()
	getHello(): string {
		return this.appService.getHello();
	}

	@Get("hello")
	helloWorld(): string {
		return "Hello world!!!!";
	}
}

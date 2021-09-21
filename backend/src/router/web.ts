/**
 * Here you put all the API routes
 */

import { TestController } from "../controllers/TestController";
import { Route } from "./Route";

Route.get("/", TestController, "index");
Route.get("/user", TestController, "user");

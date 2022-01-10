import { setScreen } from "./view.js";
import { Main } from "./components/main.js";
import { Login } from "./components/login.js";

firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        const main = new Main(user);
        setScreen(main);
    } else {
        const login = new Login();
        setScreen(login);
    }
});
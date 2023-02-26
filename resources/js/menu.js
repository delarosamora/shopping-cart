import { Menu } from "./components/Menu/Menu";
import ReactDOM from 'react-dom';

if (document.getElementById('navbar-menu')) {
    ReactDOM.render(<Menu />, document.getElementById('navbar-menu'));
}

import { WinnerList } from './winnerList.js';
import { Rotation } from './rotation.js?v=2';
class Main {
    $container;
    $title;
    $btnLogout;
    $btnListWinners;
    $rotation;
    $control;
    $winnerList;


    constructor() {
        this.$container = document.createElement('div');
        this.$container.classList.add('main');

        this.$control = document.createElement('div');
        this.$control.classList.add('control');

        this.$btnLogout = document.createElement('button');
        this.$btnLogout.classList.add('btn', 'btn-primary');
        this.$btnLogout.innerHTML = 'Logout';
        this.$btnLogout.addEventListener('click', this.handleLogout);

        this.$btnListWinners = document.createElement('button');
        this.$btnListWinners.classList.add('btn', 'btn-primary');
        this.$btnListWinners.innerHTML = 'Danh sách trúng thưởng';
        this.$btnListWinners.addEventListener('click', this.handleWinnerList);

        this.$winnerList = new WinnerList();
        this.$winnerList.setVisible(false);

        this.$rotation = new Rotation();
    }

    handleWinnerList = () => {
        this.$winnerList.setVisible(true);
    }

    handleLogout = () => {
        firebase.auth().signOut();
    };

    render() {
        this.$control.appendChild(this.$btnListWinners);
        this.$control.appendChild(this.$btnLogout);

        this.$container.appendChild(this.$rotation.render());
        this.$container.appendChild(this.$winnerList.render());
        this.$container.appendChild(this.$control);

        return this.$container;
    }
}

export { Main };
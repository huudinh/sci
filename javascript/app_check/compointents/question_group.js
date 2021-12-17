class QuestionGroup {
    $container;
    $name;
    $nameValue;


    constructor(names, nameValue) {
        this.$container = document.createElement('div');
        this.$container.classList.add('checkTitle');

        this.$name = document.createElement('div');
        this.$name.innerHTML = names;
        this.$name.classList.add('checkTitleName')

        this.$nameValue = document.createElement('div');
        this.$nameValue.innerHTML = nameValue;
    }

    render = () => {
        this.$container.appendChild(this.$name);
        this.$container.appendChild(this.$nameValue);
        return this.$container;
    }
}
export { QuestionGroup };
class InputGroup {
    $container;
    $radio;
    $span;

    constructor(value, question, index) {
        this.$container = document.createElement('div');
        this.$container.classList.add('checkRadio');

        this.$radio = document.createElement('input');
        this.$radio.type = 'radio';
        this.$radio.name = index;
        this.$radio.value = value;
        this.$radio.classList.add('radio');


        this.$span = document.createElement('span');
        this.$span.innerHTML = question;
    };

    render = () => {
        this.$container.appendChild(this.$radio);
        this.$container.appendChild(this.$span);
        return this.$container;
    };
}
export { InputGroup };
class InputGroup {
    $container;
    $radio;
    $span;

    constructor(name, question) {
        this.$container = document.createElement('div');

        this.$radio = document.createElement('input');
        this.$radio.type = 'radio';
        this.$radio.name = name;

        this.$span = document.createElement('span');
        this.$span.innerHTML = question;
    };

    render = () => {
        this.$container.appendChild(this.$radio);
        this.$container.appendChild(this.$span);
        console.log(this.$container);
        return this.$container;
    };
}
export { InputGroup };
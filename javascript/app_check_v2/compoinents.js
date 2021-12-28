const compoinents = {}

compoinents.inputGroup = (name, value, question) => {
    let render = `
        <div class="checkRadio">
            <input type="radio" name="${name}" value="${value}" class="radio">
            <span>${question}</span>
        </div>
    `;
    return render;
}

compoinents.questionGroup = (question, content) => {
    let render = `
        <div class="checkTitle">
            <div class="checkTitleName">${question}</div>
            <div>${content}</div>
        </div>
    `;
    return render;
}
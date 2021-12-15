import { InputGroup } from "./compointents/input_group.js";
import { QuestionGroup } from "./compointents/question_group.js";

const data = [{
        name: 'Cau 1',
        nameValue: '1. Tình trạng nám/ tàn nhang của bạn tập trung ở vùng nào? ',
        question: [{
                questionName: 'A',
                questionValue: 'A. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'B',
                questionValue: 'B. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'C',
                questionValue: 'C. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'D',
                questionValue: 'D. 2 gò má và dưới 10 nốt',
            },
        ],
    },
    {
        name: 'Cau 2',
        nameValue: '2. Tình trạng nám/ tàn nhang của bạn tập trung ở vùng nào? ',
        question: [{
                questionName: 'A',
                questionValue: 'A. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'B',
                questionValue: 'B. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'C',
                questionValue: 'C. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'D',
                questionValue: 'D. 2 gò má và dưới 10 nốt',
            },
        ],
    },
    {
        name: 'Cau 3',
        nameValue: '3. Tình trạng nám/ tàn nhang của bạn tập trung ở vùng nào? ',
        question: [{
                questionName: 'A',
                questionValue: 'A. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'B',
                questionValue: 'B. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'C',
                questionValue: 'C. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'D',
                questionValue: 'D. 2 gò má và dưới 10 nốt',
            },
        ],
    },
    {
        name: 'Cau 4',
        nameValue: '4. Tình trạng nám/ tàn nhang của bạn tập trung ở vùng nào? ',
        question: [{
                questionName: 'A',
                questionValue: 'A. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'B',
                questionValue: 'B. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'C',
                questionValue: 'C. 2 gò má và dưới 10 nốt',
            },
            {
                questionName: 'D',
                questionValue: 'D. 2 gò má và dưới 10 nốt',
            },
        ],
    },

]
const app_check = document.getElementById('app_check');

// console.log(data);

for (let i = 0; i < data.length; i++) {
    let index = i;
    // console.log(data[i].name);
    const questionGroup = new QuestionGroup(data[i].name, data[i].nameValue);
    app_check.appendChild(questionGroup.render());

    for (let item of data[i].question) {
        // console.log(item.questionName);
        const inputGroup = new InputGroup(item.questionName, item.questionValue, index);
        app_check.appendChild(inputGroup.render());
    }
}


let button = document.createElement('button');
button.innerHTML = 'Nhan ket qua';
button.classList.add('ketQua');

app_check.appendChild(button);


button.addEventListener('click', () => {
    let arrResult = [];
    let radio = document.getElementsByClassName('radio');
    console.log(radio);
    for (let i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            arrResult.push(radio[i].value);
        }
    }
    console.log(arrResult);
    // console.log(filterSame(arrResult));
    let ketQua = filterSame(arrResult);

    let a, b, c, d;

    if (ketQua.A) {
        a = ketQua.A;
    } else {
        a = 0;
    }
    if (ketQua.B) {
        b = ketQua.B;
    } else {
        b = 0;
    }
    if (ketQua.C) {
        c = ketQua.C;
    } else {
        c = 0;
    }
    if (ketQua.D) {
        d = ketQua.D;
    } else {
        d = 0;
    }

    let number = data.length / 2;

    if (a >= number) {
        console.log('Nam Muc 1')
    } else if (b >= number) {
        console.log('Nam Muc 2')
    } else {
        console.log('Nam Muc 3')
    }


    // console.log(a, b, c, d);
});

function filterSame(a) {
    let result = {};
    for (var i = 0; i < a.length; ++i) {
        if (!result[a[i]])
            result[a[i]] = 0;
        ++result[a[i]];
    }
    return result;
}


// const inputGroup = new InputGroup('A', 'A. Câu 1');
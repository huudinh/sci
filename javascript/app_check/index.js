import { InputGroup } from "./compointents/input_group.js";

const data = [{
        name: '1. Tình trạng nám/ tàn nhang của bạn tập trung ở vùng nào? ',
        question: [
            'A. 2 gò má và dưới 10 nốt',
            'B. 2 gò má và dưới 10 nốt',
            'C. 2 gò má và dưới 10 nốt',
            'D. 2 gò má và dưới 10 nốt',
        ]
    },
    {
        name: '2. Tình trạng nám/ tàn nhang của bạn tập trung ở vùng nào? ',
        question: [
            'A. 2 gò má và dưới 10 nốt',
            'B. 2 gò má và dưới 10 nốt',
            'C. 2 gò má và dưới 10 nốt',
            'D. 2 gò má và dưới 10 nốt',
        ]
    },
]

console.log(data);

const app_check = document.getElementById('app_check');

const inputGroup = new InputGroup('A', 'A. Câu 1');

app_check.appendChild(inputGroup.render());
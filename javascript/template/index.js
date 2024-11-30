// const data = {
//     title: "Dynamic Title",
//     excerpt: "This description is dynamically inserted from an object."
// };

const template = document.getElementById('my-template').content;
const clone = document.importNode(template, true);

function render(title, description) {
    // Chèn dữ liệu từ object vào template
    clone.querySelector('.title').textContent = title;
    clone.querySelector('p').textContent = description;

    document.querySelector('#output').appendChild(clone);
}

// render(data.title, data.excerpt);

const getData_news_kn_2_0_0 = async (count, postID) => {
    const response = await fetch(`https://benhvienthammykangnam.vn/wp-json/api/v1/latest-news/${count}/${postID}/`);
    const data = await response.json();
    return data;
};

const run = async () => {
    const data = await getData_news_kn_2_0_0(9, 8);
    render(data[0].title, data[0].excerpt);
    console.log(data);
};
run();
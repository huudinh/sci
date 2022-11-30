const students = [
    { name: "Alex", grade: 15 },
    { name: "Devlin", grade: 15 },
    { name: "Eagle", grade: 13 },
    { name: "Sam", grade: 14 },
];

students.sort((firstItem, secondItem) => firstItem.grade - secondItem.grade);
console.log(students);
window.addEventListener('load', () => {
    const valueElement = document.getElementById('value');
    const initialDate = new Date('2024-06-18');
    const initialValue = 2000;

    function updateValue() {
        const currentDate = new Date();
        const timeDifference = currentDate - initialDate; // Time difference in milliseconds
        const daysPassed = Math.floor(timeDifference / (1000 * 60 * 60 * 24)); // Convert milliseconds to days
        const currentValue = initialValue + daysPassed;

        valueElement.textContent = currentValue;
    }

    updateValue();
    setInterval(updateValue, 1000 * 60 * 60 * 24); // Update every 24 hours
});

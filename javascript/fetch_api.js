// Get Ticket
const getTicket = async (info) => {
    const response = await fetch(`
        https://benhvienthammykangnam.com.vn/cp/api-remkt/get-ticket-userid?
        created_since=${info.created_since}&
        token=${info.token}&
        requester_id=${info.id}
    `);
    const data = await response.json();
    // console.log(data);
    const ticket_id = data.tickets[0]['ticket_id']
    return ticket_id;
};

// Send API
function sendAPI(info, ticket_id, ticket_status) {
    value1 = info.id;
    value2 = ticket_id;
    value3 = ticket_status;
    value4 = info.created_since;
    value5 = info.source;
    value6 = new Date().toLocaleDateString();
    value7 = window.location.href;
    name1 = 'Requester_id';
    name2 = 'Ticket_id';
    name3 = 'Ticket_status';
    name4 = 'Created_since';
    name5 = 'Source';
    name6 = 'Date Create';
    name7 = 'Link';

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch(`https://script.google.com/macros/s/AKfycbxAIk3qJQAHwraUxiXTOOoES9NUvFYeZlRgHq2RTdH0uybA_1dVns8JDZkumiW8ajmW1Q/exec?${name1}=${value1}&${name2}=${value2}&${name3}=${value3}&${name4}=${value4}&${name5}=${value5}&${name6}=${value6}&${name7}=${value7}`, requestOptions)
        .then(response => response.text())
        .then(result => {
            console.log(result);
        })
        .catch(error => console.log('error', error));
}
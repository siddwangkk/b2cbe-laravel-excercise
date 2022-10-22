
const getAllItems = async () => {
    const fetchResult = await fetch('/api/v1/items')
    const jsonResult = await fetchResult.json()

    return jsonResult.data
}

const renderAllItems = (items) => {
    const itemsFragment = new DocumentFragment()

    items.forEach(item => {
        const rowDiv = document.createElement('tr')
        rowDiv.classList.add('pb-3')
        rowDiv.innerHTML = `
            <td>${item.id}</td>
            <td>
                <a href="/items/${item.id}"> ${item.name}</a>
            </td>
            <td>
                <a href="${item.url}" target="_blank"> ${item.url}</a>
            </td>
            <td>${item.price}</td>
            <td>${item.qty}</td>
        `
        itemsFragment.append(rowDiv)
    })
    $('#items-tbody').append(itemsFragment)
}

const renderIndexPage = async () => {
    const items = await getAllItems()
    renderAllItems(items)
}

const deleteAllItems = async (e) => {
    e.preventDefault();
    e.stopPropagation();

    const fetchResult = await fetch('/api/v1/items', {
        method: 'DELETE'
    })
    const jsonResult = await fetchResult.json()

    if (jsonResult.status === "success") {
        return window.location = "/items"
    }
    else {
        return window.location = "/404.html"
    }
}

const goToDetailPage = async(e, id) => {
    e.preventDefault()
    e.stopPropagation()

    return window.location = `/items/${id}`
}

const goToCreatePage = async(e) => {
    e.preventDefault()
    e.stopPropagation()

    return window.location = "/items/create"
}

$('#delete-all-btn').on('click', deleteAllItems)
$('#add-item-btn').on('click', goToCreatePage)

renderIndexPage()

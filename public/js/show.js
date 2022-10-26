const getItemId = () => {
    const pageURL = new URL(window.location.href)
    const itemId = pageURL.pathname.split('/').pop()

    return parseInt(itemId)  ? itemId : window.location = "/404.html"
}

const getItemDetail = async () => {
    const pageURL = new URL(window.location.href)
    const itemId = getItemId()
    const fetchResult = await fetch(`/api/v1/items/${itemId}`)
    const jsonResult = await fetchResult.json()

    if (!jsonResult.success) {
        return  window.location = "/404.html"
    }

    return jsonResult.data
}

const renderItemDetail = (item) => {

    const bodyFragment = new DocumentFragment()
    const titleDiv = document.createElement('div')
    titleDiv.classList.add('row','mb-4')
    titleDiv.innerHTML =
        `<div className="row mb-4">
            <div className="col-12">
                <h1>Detail for ${item.name}</h1>
            </div>
        </div>
        `
    const detailDiv = document.createElement('div')
    detailDiv.classList.add('row' ,'mb-5')
    detailDiv.innerHTML = `
        <div className="row mb-5">
            <div className="col-12">
                <p className="h5 pb-3"><strong>Name: </strong> ${item.name}</p>
                <p className="h5 pb-3"><strong>URL: </strong><a href="${item.url}" target="_blank">${item.url}</a>
                </p>
                <p className="h5 pb-3"><strong>Price(USD): </strong>$ ${parseFloat(item.price).toLocaleString('en')}</p>
                <p className="h5 pb-3"><strong>Quantity: </strong>${item.qty}</p>
                <p className="h6 pb-3" style="color: gray;"><strong>Created Time: </strong>${item.created_at}</p>
                <p className="h6 pb-3" style="color: gray;"><strong>Update Time: </strong>${item.updated_at}</p>
            </div>
        </div>
        `
    const buttonDiv = document.createElement('div')
    buttonDiv.classList.add('d-flex','justify-content-between')
    buttonDiv.innerHTML = `
        <button id="edit-item-btn"  class="btn btn-dark" style="width:75px;">Edit</button>
        <button id="delete-item-btn"  class="btn btn-danger">Delete</button>
    `

    bodyFragment.append(titleDiv, detailDiv, buttonDiv)

    document.title = `Detail for ${item.name}`
    $('#banner-title').text(`Edit Detail for ${item.name}`)
    $('.container').append(bodyFragment)
    $('#edit-item-btn').click('on', goToEditPage)
    $('#delete-item-btn').click('on', deleteItem)
}

const renderShowPage = async () => {
    const item = await getItemDetail()
    renderItemDetail(item)
}

const deleteItem = async (e) => {
    e.preventDefault();
    e.stopPropagation();

    const itemId = getItemId()

    const fetchResult = await fetch(`/api/v1/items/${itemId}`, {
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


const goToEditPage = async(e) => {
    e.preventDefault()
    e.stopPropagation()

    const itemId = getItemId()

    return window.location = `/items/${itemId}/edit`
}

renderShowPage()


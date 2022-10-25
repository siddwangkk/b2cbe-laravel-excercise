import { renderErrorMessage } from './utils.js'

const getItemId = () => {
    const pageURL = new URL(window.location.href)
    const itemId = pageURL.pathname.split('/')[2]

    return parseInt(itemId)  ? itemId : window.location = "/404.html"
}

const getItemDetail = async () => {
    const pageURL = new URL(window.location.href)
    const itemId = getItemId()
    const fetchResult = await fetch(`/api/v1/items/${itemId}`)
    const jsonResult = await fetchResult.json()

    if (!jsonResult.success) {
        return window.location = "/404.html"
    }

    document.title = `Edit Detail for ${jsonResult.data.name}`

    return jsonResult.data
}

const renderItemDetail = async (item) => {


    $('#banner-title').text(`Edit Detail for ${item.name}`)
    $('#item-name').val(item.name)
    $('#item-url').val(item.url)
    $('#item-price').val(item.price)
    $('#item-qty').val(item.qty)

    $('#confirm-btn').click('on', updateDetail)
    $('#cancel-btn').click('on', cancelEdit)
}

const renderEditPage = async () => {
    const item = await getItemDetail()
    renderItemDetail(item)
}

const getFormInputValue = () => {
    const formData = new FormData()
    formData.append('name', $('#item-name').val())
    formData.append('url', $('#item-url').val())
    formData.append('price', $('#item-price').val())
    formData.append('qty', $('#item-qty').val())
    formData.append('_method', 'PUT');

    return formData
}

const updateDetail = async(e) => {
    e.preventDefault()
    e.stopPropagation()

    const itemId = getItemId()
    const formData = new FormData()
    const fetchResult = await fetch(`/api/v1/items/${itemId}`, {
        method : 'POST',
        body: getFormInputValue(),
    })
    const jsonResult = await fetchResult.json()

    if (!jsonResult.success) {
        return renderErrorMessage(jsonResult.data)
    } else {
        return window.location = "/items"
    }
}

const cancelEdit = async(e) => {
    e.preventDefault()
    e.stopPropagation()

    const itemId = getItemId()

    return window.location = `/items/${itemId}`
}

renderEditPage()

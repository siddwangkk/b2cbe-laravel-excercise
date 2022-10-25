import { renderErrorMessage } from './utils.js'

const createItem = async(e) => {
    e.preventDefault()
    e.stopPropagation()

    const item = new FormData(document.getElementById("new-item-form"))
    const fetchResult = await fetch('/api/v1/items', {
        'method': 'POST',
        'body': item,
    })
    const jsonResult = await fetchResult.json()

    if (!jsonResult.success) {
        return renderErrorMessage(jsonResult.data)
    } else {
        return window.location = "/items"
    }
}

$('#new-item-btn').click('on', createItem)

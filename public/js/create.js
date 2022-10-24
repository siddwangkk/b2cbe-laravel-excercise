const createItem = async(e) => {
    e.preventDefault()
    e.stopPropagation()

    const item = new FormData(document.getElementById("new-item-form"))
    const fetchResult = await fetch('/api/v1/items', {
        'method' : 'POST',
        'body': item
    })
    const jsonResult = await fetchResult.json()

    if (jsonResult.data.id) {
        return window.location = "/items"
    } else {
        return window.location = "/404.html"
    }
}

$('#new-item-btn').click('on', createItem)

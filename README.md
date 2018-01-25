Task 1:
Create a Magento module call "Gide_Task". In this module using an observer inject json+ld
into the product page by using an observer. The json+ld snippet should look like this in the
page:

< script type= "application/ld+json" >

{

"@context": "http://schema.org/",

"@type": "Product",

"name": "Executive Anvil",

"image": [

"https://example.com/photos/1x1/photo.jpg",

"https://example.com/photos/4x3/photo.jpg",

"https://example.com/photos/16x9/photo.jpg"

],

"description": "Sleeker than ACME's Classic Anvil, the Executive Anvil is perfect for the business traveler

looking for something to drop from a height.",

"sku": "925872",

"aggregateRating": {

"@type": "AggregateRating",

"ratingValue": "4.4",

"reviewCount": "89"

},

"offers": {

"@type": "Offer",

"priceCurrency": "USD",

"price": "119.99",

"priceValidUntil": "2020-11-05",

"itemCondition": "http://schema.org/UsedCondition",

"availability": "http://schema.org/InStock"

}

}

</ script >

Consider special cases when product is: bundle/simple/configurable.
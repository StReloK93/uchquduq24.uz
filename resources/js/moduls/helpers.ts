export function imageExists(url) {
    var image = new Image();
    image.src = `https://uchquduq24.uz/img/${url}`;
    if (!image.complete)  return false
    else if (image.height === 0)  return false
    return true;
}
export function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}
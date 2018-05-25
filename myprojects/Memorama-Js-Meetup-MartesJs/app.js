var tablero = document.getElementById('tablero')

var cartas = [1, 2, 3, 4, 5, 6, 7, 8]
var parejas = cartas.length

cartas = cartas.concat(cartas)
cartas = cartas.sort(function () { return Math.random() - 0.5 })

var primerCarta = 0
var segundaCarta = 0

function turno (event) {
  var DOMElement = event.target

  if (primerCarta !== 0 && segundaCarta !== 0) {
    // console.log('Tercer turno')

    // limpiar banderas
    if (primerCarta.innerText !== segundaCarta.innerText) {
      primerCarta.classList.remove('open')
      segundaCarta.classList.remove('open')
    }

    primerCarta = 0
    segundaCarta = 0
  }

  DOMElement.classList.add('open')

  if (primerCarta === 0) {
    primerCarta = DOMElement
    // console.log('Primer turno')
  } else {
    segundaCarta = DOMElement
    // console.log('Segundo turno')

    if (primerCarta.innerText === segundaCarta.innerText) {
        parejas = parejas - 1
    }

    if (parejas === 0) {
      console.log('Ganaste', parejas)
      alert('Ganaste')
      location.reload()
    }
  }


  if (primerCarta === segundaCarta) {

  }
}

cartas.forEach(function (val) {
  var element = document.createElement('div')
  element.innerText = val

  element.addEventListener('click', turno, true)

  tablero.appendChild(element)
})

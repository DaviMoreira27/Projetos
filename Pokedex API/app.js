const numbPokemons = document.querySelector("#pokNum");
const tipoPokemon = document.getElementById("tipos");


tipoPokemon.addEventListener('change', () => {
  console.log(tipoPokemon.value);
});



let numeroChange;
let typePoke;

const numbFilter = addEventListener("input", (event) => {
  let numeroChange = event.target.value.trim();

  const fetchAllPokemon = () => {
    const getpokemon = (id) => `https://pokeapi.co/api/v2/pokemon/${id}`;
    const pokemonPromises = [];

    for (let id = 1; id <= numeroChange; id++) {
      pokemonPromises.push(
        fetch(getpokemon(id)).then((response) => response.json())
      );
    }

    Promise.all(pokemonPromises).then((pokemons) => {
      const listPokemon = pokemons.reduce((accumulator, pokemon) => {
        const types = pokemon.types.map((typeInfo) => typeInfo.type.name);
            
        if (types[0] == "steel") {
          accumulator += `
            <li class="card ${types[0]}"> 
                <img class="card-image" alt="${
                  pokemon.name
                }" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${
            pokemon.id
          }.png">
                <h2 class="card-title">${pokemon.id}. ${pokemon.name}</h2>
                <p class="card-subtitle">${types.join(" | ")}</p>
            </li>
            `;
        }
        return accumulator;
      }, "");

      const ul = document.querySelector('[data-js="pokedex"');

      ul.innerHTML = listPokemon;
    });
  };

  fetchAllPokemon();
});

numbFilter;

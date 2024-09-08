let variationsHolder = document.getElementById("variations");

function addVariationField() {
  let variationsNumber =
    variationsHolder.querySelectorAll(".single-variation").length;

  variationsNumber++;

  let newVariationField = document.createRange()
    .createContextualFragment(`<div class="single-variation form-inputs">
  <div class="delete-variation" onclick="deleteVariation(this.parentElement)">
  إلغاء الإضافة
  </div>
  <div class="input-field">
    <label for="pvd-${variationsNumber}">وصف قصير</label>
    <input
      type="text"
      name="variations_descriptions[]"
      id="pvd-${variationsNumber}"
      placeholder="وصف الإختلاف" />
    <div class="error-field"></div>
  </div>

  <div class="input-field">
    <label for="pvp-${variationsNumber}">السعر</label>
    <input type="number" name="variations_prices[]" id="pvp-${variationsNumber}" value="100" placeholder="سعر الإختلاف" />
    <div class="error-field"></div>
  </div>
</div>`);

  variationsHolder.appendChild(newVariationField);
}

function deleteVariation(variation) {
  variation.remove();
}

function deleteVariationFromDB(variation) {}

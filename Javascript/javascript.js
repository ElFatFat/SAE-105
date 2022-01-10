function selectorHero(choice) {
  if (choice == 1) {
    console.log("1");
    document.getElementById("div_selector_one").className = "active_selector";
    document.getElementById("div_selector_two").className = "";
    document.getElementById("div_selector_three").className = "";

    document.getElementById("h2_heroSection_title").innerHTML =
      "Scaled and Icy";
    document.getElementById("h3_heroSection_description").innerHTML =
      "Le nouvel album de Twenty One Pilots, disponible dès maintenant.";
    document.getElementById("a_heroSection_link").innerHTML =
      "Cliquez ici pour l'acheter";
    document.getElementById("div_content_heroSection").style.background =
      "#000000 url('Ressources/image1.jpg') no-repeat top center";
  }
  if (choice == 2) {
    console.log("2");
    document.getElementById("div_selector_one").className = "";
    document.getElementById("div_selector_two").className = "active_selector";
    document.getElementById("div_selector_three").className = "";

    document.getElementById("h2_heroSection_title").innerHTML = "Bandito Tour";
    document.getElementById("h3_heroSection_description").innerHTML =
      "La tournée mondiale de Twenty One Pilots, près de chez vous.";
    document.getElementById("a_heroSection_link").innerHTML =
      "Cliquez ici pour voir les dates";
    document.getElementById("div_content_heroSection").style.background =
      "#000000 url('Ressources/image2.jpg') no-repeat center center";
  }
  if (choice == 3) {
    console.log("3");
    document.getElementById("div_selector_one").className = "";
    document.getElementById("div_selector_two").className = "";
    document.getElementById("div_selector_three").className = "active_selector";

    document.getElementById("h2_heroSection_title").innerHTML = "Blurryface";
    document.getElementById("h3_heroSection_description").innerHTML =
      "L'album à succès ayant popularisé Twenty One Pilots";
    document.getElementById("a_heroSection_link").innerHTML =
      "Cliquez ici pour l'acheter";
    document.getElementById("a_heroSection_link").innerHTML =
      "Cliquez ici pour l'acheter";
    document.getElementById("div_content_heroSection").style.background =
      "#000000 url('Ressources/image3.jpg') no-repeat center center";
  }
}

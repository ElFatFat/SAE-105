function addToClipboard(value) {
  switch (value) {
    case 0:
      text =
        '<iframe src="https://open.spotify.com/embed/track/6XBaTMiZa77Du2XEl1RNaa?utm_source=generator&theme=0" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';

      break;

    default:
      break;
  }
  navigator.clipboard.writeText(text);
  alert("Code copié !");
}

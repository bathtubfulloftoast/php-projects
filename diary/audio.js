const audio = document.querySelector("audio"); // Get a reference to the audio element
const lengthSpan = document.getElementById("length"); // New element for length

audio.addEventListener("loadedmetadata", function() {
  // Check if audio duration is available and not NaN (Not a Number)
  if (!isNaN(this.duration)) {
    const hours = Math.floor(this.duration / 3600);
    const minutes = Math.floor((this.duration % 3600) / 60);
    const seconds = Math.floor(this.duration % 60);

    // Format the length string (optional)
    const formattedLength = `${hours ? `${hours}:${minutes.toString().padStart(2, "0")}` : minutes}:${seconds.toString().padStart(2, "0")}`;
    lengthSpan.textContent = `${formattedLength}`;
  } else {
    lengthSpan.textContent = "Length: Not available"; // Handle unavailable duration
  }
});

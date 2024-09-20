
//Download all images
const imgSrcs = [];
const imgs = document.querySelectorAll("img");

for (let i = 0; i < imgs.length; i++) {
    imgSrcs.push(imgs[i].src);
}
const downloadAll = document.getElementById('downloadAll');
downloadAll.addEventListener('click', () => {
    for (let i = 0; i < imgSrcs.length; i++) {
        const imageUrl = imgSrcs[i];
        download(imageUrl);
    }
});

//selected images
let selectedImages = [];

for (let i = 0; i < imgs.length; i++) {
    imgs[i].addEventListener('click', () => {
        if (selectedImages.includes(imgs[i].src)) {
            selectedImages.splice(selectedImages.indexOf(imgs[i].src), 1);
        } else {
            selectedImages.push(imgs[i].src);
        }
        imgs[i].classList.toggle('selected');
        downloadAll.style.display = 'none';
        downloadBtn.style.display = 'block';
        cancel.style.display = 'block';
    });
}

const downloadBtn = document.getElementById('download');
downloadBtn.addEventListener('click', () => {
    for (let i = 0; i < selectedImages.length; i++) {
        const imageUrl = selectedImages[i];
        download(imageUrl);
    }
});

//cancel selected images by clicking on cancel button
const cancel = document.getElementById('cancel');
cancel.addEventListener('click', () => {
    if (selectedImages.length > 0) {
        // Supprimer la classe 'selected' de chaque image sélectionnée
        for (let i = 0; i < imgs.length; i++) {
            imgs[i].classList.remove('selected');
        }
    }
    // Réinitialiser le tableau des images sélectionnées à un tableau vide
    selectedImages = [];
    downloadAll.style.display = 'block';
    downloadBtn.style.display = 'none';
    cancel.style.display = 'none';
});

const download = (imageUrl) => {
    // Extraire le nom de fichier depuis l'URL
    const fileName = imageUrl.substring(imageUrl.lastIndexOf('/') + 1);
    console.log(fileName);
    const link = document.createElement('a');
    link.href = imageUrl;
    link.download = fileName; // Utiliser le nom de fichier extrait
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
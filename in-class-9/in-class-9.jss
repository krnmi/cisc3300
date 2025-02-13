function includesPinecone(sentence) {
    return str.includes('pinecone');
}
const sentences = [
    "i see a pinecone on my morning walks",
    "i have a dog",
    "where does a pinecone come from",
    "i love sleeping!"
];

const sentencesIncludingPinecone = sentences.filter(includesPinecone);
console.log(filteredSentences);

function containsPinecone(sentence) {
    return sentence.includes('pinecone');
}
const sentences = [
    "i see a pinecone on my morning walks",
    "i have a dog",
    "where does a pinecone come from",
    "i love sleeping!"
];

const filteredSentences = sentences.filter(containsPinecone);
console.log(filteredSentences);

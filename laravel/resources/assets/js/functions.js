export default function filter (articles, tags) {
    return articles.filter(article =>
        this.isMatch(tags, article)
    )   
}

function isMatch(filters, article) {
    for (let i = 0; i < filters.length; i++) {
      if (article.articleTags.indexOf(filters[i]) === -1) {
        return false;
      }
    }
    return true;
}
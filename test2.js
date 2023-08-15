function lonelyinteger(a) {
  // Write your code here
  let res = [];
  for(let i = 0; i < a.length; i++) {
      let count = 0;
      for(let j = 0; j < a.length; j++) {
          if(a[i] == a[j]) {
              count++;
          }
      }
      
      if (count == 1) {
        return a[i];
      }
  }
  
  return 'no unique value';
}

console.log(lonelyinteger([1,2,3,4,3,2,1])); // Output: [2, 2, 2]

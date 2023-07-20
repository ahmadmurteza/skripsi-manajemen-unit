
// function solution(A, K) {

//     if (K === 0 || A.length === 0) {
//         return A;
//       }
    
//       const rotations = K % A.length;
//       console.log(rotations);
//       const rotatedPart = A.splice(A.length - rotations);
//       return rotatedPart.concat(A);
// }

// solution([3, 8, 9, 7, 6], 10);


//// unpaired odd array
// function solution(A) {
    
//     let unpairedElement = null;
//   let counts = {};

//   for (let i = 0; i < A.length; i++) {
//     let element = A[i];
//     counts[element] = (counts[element] || 0) + 1;
//   }

//   for (let key in counts) {
//     if (counts[key] % 2 !== 0) {
//       unpairedElement = parseInt(key);
//       break;
//     }
//   }

//   console.log(unpairedElement);
//   return unpairedElement;

// }

// solution([9, 3, 9, 3, 9, 6, 9, 3, 9, 3, 9]);



// frogs jump

// function solution(X, Y, D) {

//     console.log(Math.ceil((Y - X) / D));
// }

// solution(10, 100, 10);

// missing element

// function solution(A) {

//     const N = A.length + 1; // Panjang array seharusnya
//     const totalExpected = (N * (N + 1)) / 2; // Total seharusnya
//     // console.log(totalExpected);
//     const actualTotal = A.reduce((sum, num) => sum + num, 0); // Total aktual
// //   console.log(totalExpected - actualTotal);
//     return totalExpected - actualTotal; // Mengembalikan elemen yang hilang
// }

// solution([2, 3, 1, 5, 6, 7, 8, 9,  10, 11]);


// TapeEquilibrium
// function solution(A) {
//     // Implement your solution here

//     const N = A.length;
//   let totalSum = 0;

//   // Menghitung total jumlah semua elemen dalam array
//   for (let i = 0; i < N; i++) {
//     totalSum += A[i];
//   }

//   let minDifference = Infinity;
//   let leftSum = 0;

//   // Mencari perbedaan minimum dengan mencoba setiap P
//   for (let P = 1; P < N; P++) {
//     leftSum += A[P - 1];
//     const rightSum = totalSum - leftSum;
//     const difference = Math.abs(leftSum - rightSum);

//     if (difference < minDifference) {
//       minDifference = difference;
//     }
//   }

//   return minDifference;
// }

// solution([3,1,2,4,3]);

// demo task
// function solution(A) {
//     let uniqueAndSorted = [...new Set(A)].sort() 
//     console.log(uniqueAndSorted);
//     for (let i = 0; i < uniqueAndSorted.length; i++) {
        
//     }
//     // const sorting = A.sort(function(a, b){return a - b});
//     // let res = 1;
//     // console.log(sorting);
//     // for (let i = 0; i < A.length; i++) {
//     //     if (A[i + 1] ) {
//     //         const element = array[i];
//     //     }
//     // }
//     // let res = 1;
//     // for (let i = 0; i < A.length; i++) {
//     //     if (condition) {
            
//     //     }
//     //     const element = array[i];
//     // }
// }

// solution([1, 3, 6, 4, 1, 2]);


// camel case 4

// function solution(input) {
    
//     const inputs = input.split('\r\n');
//     let allResult = [];
//     for (let h = 0; h < inputs.length; h++) {
//         let split = inputs[h].split(';');
//         // console.log(split);

//         if (split[0] === "S") {
//             let result = split[2].split(/(?=[A-Z])/);
//             // console.log(result.join(" ").toLowerCase());
//             allResult.push(result.join(" ").toLowerCase().replace("()", ""));
//         }

//         if (split[0] === "C") {
//             let result = split[2].split(" ");
//             // console.log(result);
//             if (split[1] === "M") {
//                 for (let i = 1; i < result.length; i++) {
//                     result[i] = result[i].charAt(0).toUpperCase() + result[i].slice(1);

//                 }
//                 // console.log(result.join("")+"()");
//                 allResult.push(result.join("")+"()");

//             }

//             if (split[1] === "V") {
//                 for (let i = 1; i < result.length; i++) {
//                     result[i] = result[i].charAt(0).toUpperCase() + result[i].slice(1);

//                 }
//                 // console.log(result.join(""));
//                 allResult.push(result.join(""));
//             }
            
//             if (split[1] === "C") {
//                 for (let i = 0; i < result.length; i++) {
//                     result[i] = result[i].charAt(0).toUpperCase() + result[i].slice(1);

//                 }
//                 // console.log(result.join(""));
//                 allResult.push(result.join(""));
//             }
//         }
//     }

//     console.log(allResult.join("\r\n"));
    
// }


// solution('C;C;i pad\r\nS;M;iPad()');

// function NumberOfways(N, K)
// {
     
//     // Initialize a list
//     let dp = Array.from({length: N +1}, (_, i) => 0);
   
//     // Update dp[0] to 1
//     dp[0] = 1;
 
//     // Iterate over the range [1, K + 1]
//     for(let row = 1; row < K + 1; row++)
//     {
 
//         // Iterate over the range [1, N + 1]
//         for(let col = 1; col < N + 1; col++)
//         {
             
//             // If col is greater
//             // than or equal to row
//             if (col >= row)
               
//                 // Update current
//                 // dp[col] state
//                 dp[col] = dp[col] + dp[col - row];
//           }
//     }
 
//     // Return the total number of ways
//     return(dp[N]);
// }
 
//     // Driver Code
     
//     // Given inputs
//     let N = 190000000;
//     let K = 2;
     
// console.log(NumberOfways(N,K));

// function slowestKeyPress(keyTimes) {
//     let maxDuration = keyTimes[0][1]; // Durasi tombol pertama
//     let slowestKey = String.fromCharCode(keyTimes[0][0] + 97); // Karakter tombol pertama
  
//     for (let i = 1; i < keyTimes.length; i++) {
//       const duration = keyTimes[i][1] - keyTimes[i - 1][1];
  
//       if (duration > maxDuration) {
//         maxDuration = duration;
//         slowestKey = String.fromCharCode(keyTimes[i][0] + 97);
//       }
//     }
  
//     return slowestKey;
//   }
  
//   // Contoh input (waktu tombol ditekan dalam bentuk array [key, time])
//   const keyTimes = [
//     [0, 2],
//     [1, 5],
//     [0, 9],
//     [2, 15],
//   ];
  
//   const slowestKey = slowestKeyPress(keyTimes);
//   console.log("Slowest Key:", slowestKey);


// function findPairsWithSum(arr, targetSum) {
//     // Buat sebuah objek untuk menyimpan elemen yang sudah ditemukan
//     const foundElements = {};
  
//     // Iterasi melalui setiap elemen dalam array
//     for (let i = 0; i < arr.length; i++) {
//       // Cari selisih antara targetSum dengan elemen saat ini
//       const difference = targetSum - arr[i];
  
//       // Jika selisih (difference) ada dalam objek foundElements
//       // Berarti kita sudah menemukan dua elemen yang jumlahnya sama dengan targetSum
//       if (foundElements[difference]) {
//         console.log(`Pair found: ${arr[i]} and ${difference}`);
//       }
  
//       // Tambahkan elemen saat ini ke objek foundElements dengan nilai true
//       foundElements[arr[i]] = true;
//     }
//   }
  
//   // Contoh penggunaan fungsi dengan array [2, 4, 3, 5, 6, -2, 4, 7, 8, 9] dan targetSum 7
//   findPairsWithSum([2, 4, 3, 5, 6, -2, 4, 7, 8, 9], 7);



// function waysToSum(n, k) {
//     let dp = new Array(n + 1).fill(0);
//     dp[0] = 1;
//     for (let i = 1; i <= k; i++) {
//         for (let j = i; j <= n; j++) {
//             dp[j] += dp[j - i];
//         }
//     }
//     return dp[n] % 1000000007;
// }


// console.log(waysToSum(842, 91));

// def waysToSum(n, k):
//     dp = [0] * (n + 1)
//     dp[0] = 1
//     for i in range(1, k + 1):
//         for j in range(i, n + 1):
//             dp[j] += dp[j - i]
//     return dp[n] % 1000000007

// print(waysToSum(842, 91)) # Output: 143119619


// Javascript implementation of the approach

// Function to return the depth of the tree


// Function to return
// the minimum number of groups required
// function findGroups(predators) {
//     const n = predators.length;
//     const visited = new Array(n).fill(false);
//     const groups = [];
  
//     function dfs(node, group) {
//       visited[node] = true;
//       group.push(node);
  
//       const predator = predators[node];
//       if (predator !== -1 && !visited[predator]) {
//         dfs(predator, group);
//       }
//     }
  
//     for (let i = 0; i < n; i++) {
//       if (!visited[i]) {
//         const group = [];
//         dfs(i, group);
//         groups.push(group);
//       }
//     }
  
//     return groups;
//   }
  
//   // Contoh input dengan predators: [-1, 0, 1]
//   const predators = [-1, 0, 1];
//   const groups = findGroups(predators);
//   const numberOfGroups = groups.length;
//   console.log(numberOfGroups); 

// This code is contributed by famously.

// function getNumberOfGroups(predators) {
//     const map = new Map();
//     const set = new Set();
//     let count = 0;
  
//     for (let i = 0; i < predators.length; i++) {
//       if (predators[i] === -1) {
//         set.add(i);
//       } else {
//         if (!map.has(predators[i])) {
//           map.set(predators[i], []);
//         }
//         map.get(predators[i]).push(i);
//       }
//     }
  
//     while (set.size > 0) {
//       const current = set.values().next().value;
//       set.delete(current);
//       count++;
  
//       if (map.has(current)) {
//         const children = map.get(current);
//         for (let i = 0; i < children.length; i++) {
//           const child = children[i];
//           if (map.has(child)) {
//             const grandchildren = map.get(child);
//             for (let j = 0; j < grandchildren.length; j++) {
//               const grandchild = grandchildren[j];
//               if (!set.has(grandchild)) {
//                 set.add(grandchild);
//               }
//             }
//           }
//         }
//         map.delete(current);
//       }
//     }
  
//     return count;
//   }
  
//   const predators = [3, -1, 0, 1];
//   const numberOfGroups = getNumberOfGroups(predators);
//   console.log(numberOfGroups);


const books = [
  { title: 'The Da Vinci Code', author: 'Dan Brown', sales: 5094805 },
  { title: 'The Ghost', author: 'Robert Harris', sales: 807311 },
  { title: 'White Teeth', author: 'Zadie Smith', sales: 815586 },
  { title: 'Fifty Shades of Grey', author: 'E. L. James', sales: 3758936 },
  { title: 'Jamie\'s Italy', author: 'Jamie Oliver', sales: 906968 },
  { title: 'I Can Make You Thin', author: 'Paul McKenna', sales: 905086 },
  { title: 'Harry Potter and the Deathly Hallows', author: 'J.K Rowling', sales: 4475152 },
];

let greatAuthors = books.filter(item => {
  return item.sales > 1000000;
}).map(item => {
  return `${item.author} adalah penulis buku ${item.title} yang sangat hebat!`;
});


console.log(greatAuthors);
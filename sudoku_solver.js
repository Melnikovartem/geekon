
var map = [
    ['8', '', '', '', '1', '', '', '7', ''],
    ['4', '1', '3', '5', '9', '', '', '', ''],
    ['7', '', '', '', '', '2', '', '5', ''],
    ['', '', '8', '', '', '', '', '4', '6'],
    ['', '', '1', '2', '', '9', '5', '', ''],
    ['3', '4', '', '', '', '', '9', '', ''],
    ['', '8', '', '7', '', '', '', '', '5'],
    ['', '', '', '', '5', '6', '8', '9', '2'],
    ['', '5', '', '', '3', '', '', '', '1']
];

function sudoku_solver(map){

   for(var i =0; i<9; i++){
     for(var j =0; j<9; j++)
       if(map[i][j] === '')
         map[i][j] = [1,2,3,4,5,6,7,8,9]
       else
         map[i][j] = [parseInt(map[i][j])]
  }

  function prints(){
    for(var i =0; i<9; i++)
      console.log(map[i]);
    console.log("----------------");
  }

  function remove_val(x,y,val){
    var arr = map[x][y];
    for(var i = 0; i<arr.length; i++)
      if(arr[i] == val){
        map[x][y].splice(i,1);
        break;
      }
  }

  function is_in(b, arr){
    for(var i =0; i<arr.length; i++)
      if(arr[i] == b)
        return true;
    return false;
  }

  function check_group(k){
    var i, j, arr;
    for(i = 0; i<9; i++){
      arr = map[k[i][0]][k[i][1]];
      if(arr.length == 1)
        for(j = 0; j<9; j++)
          if(j != i)
            remove_val(k[j][0], k[j][1], arr[0])
            }
    var num = [0,0,0,0,0,0,0,0,0];
    for(i = 0; i<9; i++){
      arr = map[k[i][0]][k[i][1]];
      for(j = 0; j<9; j++)
        num[arr[j]-1]++;
    }
    for(i = 0; i<9; i++)
      if (num[i] == 1)
        for(j = 0; j<9; j++)
          if(is_in(i+1, map[k[j][0]][k[j][1]])){
            map[k[j][0]][k[j][1]] = [i+1];
          }
  }
  function check_all(){
    var check = []
    var i, j;

    //check lines
    for(i =0; i<9; i++){
      check =[];
     for(j =0; j<9; j++)
      check.push([i,j]);
     check_group(check);
    }

    //check col
    for(j = 0; j<9; j++){
      check =[];
     for(i =0; i<9; i++)
      check.push([i,j]);
     check_group(check);
    }

    //check groups
    for(i =0; i<9; i+=3){
      check =[];
     for(j =0; j<9; j+=3)
       for(var a =0; a<3; a++)
         for(var b =0; b<3; b++)
           check.push([a+i,b+j])
     check_group(check);
    }

    //check solved
    for(i =0; i<9; i++)
     for(j =0; j<9; j++)
       if(map[i][j].length != 1){
         return 0;
       }
  }

  console.log("start")
  for(i = 0; i< 100; i++)
    check_all();
  prints();

  return map;
}

console.log(sudoku_solver(map));

using System;
using System.Collections.Generic;
using System.Text;

namespace EcoLab
{
    class Problems
    {
        public string Picture { get; set; }
        public int CountOfSee { get; set; }
        public string Name { get; set; }
        public string Text { get; set; }
        public string Title { get; set; }
        public DateTime Date { get; set; }
        public List<Comment> Comments = new List<Comment>();
    }
}

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Reflection;
using Xamarin.Forms;
using Xamarin.Forms.StyleSheets;

namespace EcoLab
{
    class Event
    {
        public string Picture { get; set; }
        public string Date { get; set; }
        public string Place { get; set; }
        public Client Org;
        public int CountOfPeop { get; set; }
        public string Title { get; set; }
        public string Desrib { get; set; }

        public List<Client> ListOfPat = new List<Client> { };
        public List<Comment> ListOfComment = new List<Comment>();
    }
}

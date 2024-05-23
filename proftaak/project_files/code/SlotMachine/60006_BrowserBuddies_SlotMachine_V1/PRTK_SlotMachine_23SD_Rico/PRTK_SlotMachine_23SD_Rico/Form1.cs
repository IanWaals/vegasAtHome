using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace PRTK_SlotMachine_23SD_Rico
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        // Declaring Total, Bet and Credits
        public static long credits = 100;
        public static long total = 0;
        public static int bet = 5;

        //Declaring each item

        public static int p1;
        public static int p2;
        public static int p3;

        private void Form1_Load(object sender, EventArgs e)
        {
            this.Text = "Vegas@Home - Slot Machine";

            pbxSlot1Roli.Image = Image.FromFile("1.png");
            pbxSlot2Roli.Image = Image.FromFile("2.png");
            pbxSlot3Roli.Image = Image.FromFile("3.png");
        }

        public static class IntUtil
        {
            private static Random random;
            private static void Init()
            {
                if (random == null) random = new Random();
            }
            public static int Random(int min, int max)
            {
                Init();
                return random.Next(min, max);
            }
        }

        private void btnSpinRoli_Click(object sender, EventArgs e)
        {
            if (credits >= bet)
            {
                credits = credits - bet;
                lblCreditsRoli.Text = credits.ToString();

                for (var i = 0; i < 10; i++)
                {
                    p1 = IntUtil.Random(1, 10);
                    p2 = IntUtil.Random(1, 10);
                    p3 = IntUtil.Random(1, 10);
                }

                if (pbxSlot1Roli.Image != null) pbxSlot1Roli.Image.Dispose();
                pbxSlot1Roli.Image = Image.FromFile(p1.ToString() + ".png");

                if (pbxSlot2Roli.Image != null) pbxSlot2Roli.Image.Dispose();
                pbxSlot2Roli.Image = Image.FromFile(p2.ToString() + ".png");

                if (pbxSlot3Roli.Image != null) pbxSlot3Roli.Image.Dispose();
                pbxSlot3Roli.Image = Image.FromFile(p3.ToString() + ".png");

                total = 0;

                // Get results from playtable
                // Check which occurs
                if (p1 == 3) total = + 5;
                if (p1 == 2 & p2 == 0) total = total + 10;
            }
        }
    }
}
